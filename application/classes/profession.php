<?php

/**
 * Created by PhpStorm.
 * User: hejie
 * Date: 2016/5/18
 * Time: 16:39
 */
class profession
{
    public  static  $table='course';
    public  static function  Selectcourse()
    {
        return BaseClass::Selectcourse(self::$table);
    }
}