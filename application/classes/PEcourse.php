<?php

/**
 * Created by PhpStorm.
 * User: hejie
 * Date: 2016/5/19
 * Time: 15:35
 */
class PEcourse
{
    public  static  $table='course';
    public  static function  SelectPEcourse()
    {
        return BaseClass::SelectPEcourse(self::$table);
    }
}