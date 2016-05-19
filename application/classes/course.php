<?php

/**
 * Created by PhpStorm.
 * User: LZM20
 * Date: 2016/5/16
 * Time: 21:05
 */
class course
{
    public  static  $table='course';
    public  static function  getAllCourse()
    {
        return BaseClass::getAllCourse(self::$table);
    }
}