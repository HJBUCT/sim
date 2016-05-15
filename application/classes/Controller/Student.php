<?php defined('SYSPATH') or die('No direct script access.');

class Controller_student extends Controller_Template {
    public $template = 'student.tpl';

	public function action_index()
    {
//		$sql = 'select * from student';
//		$result = DB::query(Database::SELECT,$sql)->execute()->as_array();
//		print_r($result);
	}
    public function action_getalluser()
    {
        $this -> auto_render = FALSE;
        if ($this -> request -> is_ajax()) //判断是否为ajax请求
        {
            //get $arr here.
            $arr = Student::getAllStudent();
            echo json_encode($arr);//建议这样写,避免0或其他情况.
            exit;
        }
    }

} // End Welcome
