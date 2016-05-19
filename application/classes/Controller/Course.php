<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Created by PhpStorm.
 * User: hejie
 * Date: 2016/5/15
 * Time: 19:54
 */
class Controller_Course extends Controller_Template{
    public $template = 'check.tpl';
    public function action_index(){

    }
    public function action_filter(){

    }
    public function action_courseapi(){
        $this -> auto_render = FALSE;
        if ($this -> request -> is_ajax()) //判断是否为ajax请求
        {
            $data = $this->request->post();
            Course::courseInsert($data);
        }
    }
}