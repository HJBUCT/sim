<?php
/**
 * Created by PhpStorm.
 * User: jinhan
 * Date: 2016/5/11
 * Time: 10:08
 */
class Student{
    private static $table = 'student';
    
    public static function getAllStudent(){
        return BaseClass::getstudent(self::$table);
    }
    public static function getStudentById()
    {
        $data = $_COOKIE['id'];
        return BaseClass::getStuById($data);
    }
}