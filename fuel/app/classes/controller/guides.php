<?php

class Controller_Guides extends Controller_Base
{


    /**
     * 案内一覧、案内詳細
     *
     * [GET]  /guides  => 案内一覧
     * [GET]  /guides? => 案内一覧絞込
     * [GET]  /guides/:id => 案内詳細
     * 
     * $this->param; => :id
     */
    public function get_index(){
        $res = array(
            "status" => 200,
        );
        
        $id = intval($this->param('id'));
        if($id > 0){
            //==============================
            // TODO: 案内詳細
            //==============================
            $guide = Model_Guide::find_by_id($id);
            if(!$guide){
                $res["status"] = 404;
                return $res;
            }

            $guide = array(
                "detail" => $guide
            );
            array_push($res, $guide);

            return $res;
        }else if($id === 0){
            $res = array(
                "status"=>404
            );
            return $res;
        }

        
        //==============================
        // TODO: 案内一覧
        //        絞込
        //==============================


        $guides = Model_Guide::find('all')
        
        $guides = array(
            "guides" => array()
        );
        array_push($res, $guides);
        return $res;
    }
    
    /**
     * 案内の登録、観光者による案内の申請
     *
     * [POST] /guides  => 案内者による案内登録
     * [POST] /guides/:id => 観光者から案内へ申請
　     *
     */
    public function post_index(){
        $res = array(
            "status" => 200,
        );
        
        $id = intval($this->param('id'));
        if($id > 0){
            //==============================
            // TODO: 観光者から案内への申請
            //==============================

            return $res;
        }else if($id === 0){
            $res["status"] = 404;
            return $res;
        }
        
        //==============================
        // TODO: ガイドの作成
        //==============================
        $guides = array(
            "guides" => array()
        );
        array_push($res, $guides);
        return $res;
    }

    /**
     * [DEL]  /guides/:id => 案内者による案内削除
     */
    public function delete_index(){
        $res = array(
            "status" => 200,
        );
        
        $id = intval($this->param('id'));
        if($id === 0){
            $res['status'] = 400;
            return $res;
        }

        //==============================
        // TODO: ガイドの削除
        //        ガイドの作成者かのチェックも行う
        //==============================

        return $res;
    }


}
