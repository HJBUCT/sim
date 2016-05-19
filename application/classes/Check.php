<?php
/**
 * Created by PhpStorm.
 * User: hejie
 * Date: 2016/5/15
 * Time: 14:31
 */
class Check
{
    private static $table = 'courseselection_stu';
    public static function getAllCheck(){
        return BaseClass::getcheck(self::$table);
    }

    
}