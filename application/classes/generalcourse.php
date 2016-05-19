<?php

/**
 * Created by PhpStorm.
 * User: hejie
 * Date: 2016/5/19
 * Time: 15:28
 */
class generalcourse
{
    public  static  $table='course';
    public  static function  Selectgeneralcourse()
    {
        return BaseClass::Selectgeneralcourse(self::$table);
    }
}