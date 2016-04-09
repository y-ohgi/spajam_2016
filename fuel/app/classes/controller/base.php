<?php

abstract class Controller_Base extends Controller_Rest
{
    protected $format = "json";
    
    public function before(){
        parent::before();

        // XXX: tokenのチェック

        // XXX: 既に案内/観光リクエストを送っている場合は処理を中止させる
    }
    
}