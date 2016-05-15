<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Created by PhpStorm.
 * User: jinhan
 * Date: 2016/5/13
 * Time: 0:56
 */
class Controller_login extends Controller_Template{
    public $template = 'login.tpl';
    public function action_index(){

    }
    public function action_filter(){
        
    }
    public function action_loginapi(){
        $this -> auto_render = FALSE;
        //if ($this -> request -> is_ajax()) //判断是否为ajax请求
        {
            $data = $this->request->post();
            $query = Login::loginchack($data);
            if (sizeof($query) == 1)
                echo 'success';
            else
                echo 'false';
            exit;

        }
    }
}