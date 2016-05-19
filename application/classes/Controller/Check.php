<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Created by PhpStorm.
 * User: hejie
 * Date: 2016/5/15
 * Time: 14:33
 */
class Controller_check extends Controller_Template {

    public $template = 'check.tpl';
    public function action_index()
    {
        
    }

    public function action_getcheck()
    {
        $this -> auto_render = FALSE;
        if ($this -> request -> is_ajax()) //判断是否为ajax请求
        {
            //get $arr here.
            $arr = Check::getAllCheck();
            echo json_encode($arr);//建议这样写,避免0或其他情况.
            exit;
        }
    }
    
}