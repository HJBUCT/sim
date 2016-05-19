<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Created by PhpStorm.
 * User: hejie
 * Date: 2016/5/18
 * Time: 16:29
 */
class Controller_profession extends Controller_Template
{
    public $template = 'profession.tpl';

    public function action_index()
    {
//		$sql = 'select * from student';
//		$result = DB::query(Database::SELECT,$sql)->execute()->as_array();
//		print_r($result);
    }

    public function action_majorselect()
    {
        $this->auto_render = FALSE;
        if ($this->request->is_ajax()) //判断是否为ajax请求
        {
            //get $arr here.

            //  echo $_COOKIE['id'];
            $arr = profession::Selectcourse();

            echo json_encode($arr);//建议这样写,避免0或其他情况.
            exit;
        }



      /*  $data = $this->request->post();
        for($i=0;$i<sizeof($data);$i++){
            $data[$i]["data"]
        }
      */
    }

    public function action_courseapi(){
        $this -> auto_render = FALSE;
        if ($this -> request -> is_ajax()) //判断是否为ajax请求
        {
            $data = $this->request->post();
            $data = $data["data"];
            for($i=0;$i<sizeof($data);$i++){
                Insert::courseInsert($data[$i]["data"]);
            }

        }
    }
}