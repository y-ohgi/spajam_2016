<?php

class Controller_Title extends Controller_Base
{
    // protected $format = "json";

	public function action_index()
	{
        $data = array(
            "status" => 200,
            "process" =>"wait"
        );
        
        return $data;
	}

    

}
