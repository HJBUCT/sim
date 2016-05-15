<?php
/**
 * Created by PhpStorm.
 * User: jinhan
 * Date: 2016/5/11
 * Time: 10:03
 */
class BaseClass{
    public static function getstudent($table){
        $query = DB::select()
            ->from($table)
            ->execute()
            ->as_array();
//		$query = DB::query(Database::INSERT,'insert into student values (12343,"123","123")');
//        $query->execute();
        return $query;
    }
    public static function loginchack($data){
        $query = DB::select()->from($data['person'])
            ->where($data['person'].'Id','=' ,$data['id'] )
            ->and_where('password','=' ,$data['password'] )
            ->execute()
            ->as_array();
        return $query;
    }
}