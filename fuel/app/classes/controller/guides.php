<?php

class Controller_Guides extends Controller_Base
{


    public function action_index(){
        $id = intval($this->param('id'));
        if($id > 0){
            return array("id"=>$id);
        }

        return ["guides"];
    }

    
	public function action_register($id = null)
	{
        
	}

}
