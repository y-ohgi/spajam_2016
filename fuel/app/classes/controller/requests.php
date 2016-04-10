<?php

/**
 * 観光者から案内者へのリクエスト管理
 */
class Controller_Requests extends Controller_Base
{

	public function action_index()
	{
        $res = array(
            "status"=> 200,
        );
        
        $id = intval($this->param('id'));
        if($id === 0){
            $res["status"] = 400;
            return $res;
        }

        // TODO: requests_{$id}を探す
        $requests = Model_Requester::find_by_id($id);
            
        // XXX: requests_{$id} が存在し、POSTだった場合リクエストの承認
        if(Input::method() === "POST"){
            $res["status"] = 201;
            return $res;
        }else if(Input::method() === "DELETE"){
            //=TODO: 本人チェック
            $requests->delete();
            $res["status"] = 200;
            return $res;
        }
        
        $content = array(
            "content" => $requests,
        );
        array_push($res, $content);
        
        return $res;
	}


}
