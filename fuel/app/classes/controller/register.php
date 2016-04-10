<?php

/**
 * XXX: ここは認証処理しないのでRestを継承
 */
class Controller_Register extends Controller_Rest
{
    protected $format = "json";

	public function action_index()
	{
        $res = array(
            "status" => 200,
            "token" => "",
        );

        if(Input::method() !== "POST"){
            $res = array(
                "status" => 400,
            );
            return $res;
        }

        // XXX: バリデート
        $val = $this->validRegister();
        if($val !== true){
            $res = array(
                "status" => 400,
                "message" => $val
            );
            return $res;
        }

        // XXX: 時間が無いオブ無い

        $config = array(
            'path' => DOCROOT.DS.'upload',
            'randomize' => true,
            'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
        );
        Upload::process($config);

        if (Upload::is_valid()){
            Upload::save();
            $file = Upload::get_files();

            $file = 'upload/'.$file[0]['saved_as'];

        }else{
            $res = array(
                "status" => 400,
                "message" => "no image",
            );
            return $res;
        }
        

        $db = Database_Connection::instance();
        $db->start_transaction();
        try{
            
            $user = new Model_User(array(
                'name' => Input::post('name')
            ));
            $user->save();
            $user_id = intval($user->id);
            
            $profile = new Model_Profile(array(
                'img_path' => $file,
                'hobby' => Input::post('hobby'),
                'age' => intval(Input::post('age')),
                'location' => Input::post('location'),
                'remark' => Input::post('remark'),
                'user_id' => $user_id,
            ));
            $profile->save();

            $cont = Input::post('contact');
            $addr = Input::post('address');
            $contact = new Model_Contact();
            $contact->name = $cont;
            $contact->address = $addr;
            $contact->user_id = $user_id;
            $contact->save();

            $i = 0;
            while(true){
                $lang = "language_" . $i;

                $native = Input::post($lang);
                
                if($native){
                    $language = new Model_Language(array(
                        'name' => $native,
                        'user_id' => $user_id,
                    ));
                    $language->save();        
                }else{
                    break;
                }
                $i++;
            }

            // XXX: tokenの生成
            $tok = Str::random('unique');
            // XXX: tokenの登録
            $token = new Model_Token(array(
                'token' => $tok,
                'user_id' => $user_id,
            ));
            $token->save();
        
        
            
            /**/
            $db->commit_transaction();
        }catch(Exception $e){
            $db->rollback_transaction();
            var_dump($e);exit(11);
            $res = array(
                "status" => 500
            );
            return $res;
        }
        

        $res["token"] = $tok;
        
        return $res;
	}

    private function validRegister(){
        $val = Validation::instance();

        // 名前
        $val->add('name', 'name')
            ->add_rule('required');
        // 言語
        $val->add('language_0', 'language')
            ->add_rule('required');

        // 主に "line" が入る。他に"facebook, tel, mail等
        $val->add('contact', 'contact')
            ->add_rule('required');
        // 主に lineid の値が入る
        $val->add('address', 'address')
            ->add_rule('required');

        if($val->run()){
            return true;
        }else{
            foreach($val->error as $key=>$value){
                return $value->get_message();
            }
        }

    }

}
