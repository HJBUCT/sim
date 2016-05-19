<?php

/**
 * Created by PhpStorm.
 * User: hejie
 * Date: 2016/5/19
 * Time: 15:56
 */
class deletecourse
{
    public  static  $table='course';
    public  static function  getAllCourse()
    {
        return BaseClass::getAllCourse(self::$table);
    }
}