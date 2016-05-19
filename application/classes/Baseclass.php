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
    public static  function  getStuById($data)
    {
        $query = DB::select()
            ->from('student')->where('studentId','=' ,$data)
            ->execute()->as_array();
        return $query;
    }

   public static  function  majorselect($data)
    {
        $query = DB::select()
            ->from('course')
            ->execute()->as_array();
        return $query;
    }
   
    public  static  function  getAllCourse($table)
    {
        $b=$_COOKIE['id'];
        $a=DB::select('courseId')
        ->from('courseselection_stu')
        ->where('studentId','=',$b)
        ->execute()
        ->as_array();
        $query=DB::select()
            ->from($table)->where('courseId','in',$a)
            ->execute()->as_array();
        return $query;
    }

    public  static  function  Selectcourse($table)
    {

        $query=DB::query(Database::SELECT,"select * from course where PropertyId = 1 and courseId not in (select courseId from courseselection_stu where studentId = ".$_COOKIE['id'].")")->execute()->as_array();
        for ($i=0;$i<sizeof($query);$i++) {
            $teachername = DB::query(Database::SELECT,"select teacher.name from courseselection_tea,teacher where courseselection_tea.courseId=".$query[$i]['courseId']." and teacher.teacherId = courseselection_tea.teacherId" )->execute()->as_array();
            $query[$i]['teachername'] = '';
            foreach ($teachername as $teachervalue)
                $query[$i]['teachername'] = $query[$i]['teachername'].$teachervalue['name']." ";

            $classinf = DB::query(Database::SELECT,"select workout_course.weeknum,workout_course.startsection,workout_course.endsection,classroom.Place from workout_course,classroom where workout_course.courseId=".$query[$i]['courseId']." and workout_course.classroomid = classroom.Id")->execute()->as_array();
            $query[$i]['Place'] = '';
            $query[$i]['weeknum'] = '';
            foreach ($classinf as $classvalue) {
                $query[$i]['Place'] = $query[$i]['Place'] . $classvalue['Place'] . " ";
                $query[$i]['weeknum'] = $query[$i]['weeknum'] ."周".$classvalue['weeknum'].":".$classvalue['startsection']."-".$classvalue['endsection']."节;";
            }
        }
        return $query;

    }

    public  static  function  Selectgeneralcourse($table)
    {

        $query=DB::query(Database::SELECT,"select * from course where PropertyId = 2 and courseId not in (select courseId from courseselection_stu where studentId = ".$_COOKIE['id'].")")->execute()->as_array();
        for ($i=0;$i<sizeof($query);$i++) {
            $teachername = DB::query(Database::SELECT,"select teacher.name from courseselection_tea,teacher where courseselection_tea.courseId=".$query[$i]['courseId']." and teacher.teacherId = courseselection_tea.teacherId" )->execute()->as_array();
            $query[$i]['teachername'] = '';
            foreach ($teachername as $teachervalue)
                $query[$i]['teachername'] = $query[$i]['teachername'].$teachervalue['name']." ";

            $classinf = DB::query(Database::SELECT,"select workout_course.weeknum,workout_course.startsection,workout_course.endsection,classroom.Place from workout_course,classroom where workout_course.courseId=".$query[$i]['courseId']." and workout_course.classroomid = classroom.Id")->execute()->as_array();
            $query[$i]['Place'] = '';
            $query[$i]['weeknum'] = '';
            foreach ($classinf as $classvalue) {
                $query[$i]['Place'] = $query[$i]['Place'] . $classvalue['Place'] . " ";
                $query[$i]['weeknum'] = $query[$i]['weeknum'] ."周".$classvalue['weeknum'].":".$classvalue['startsection']."-".$classvalue['endsection']."节;";
            }
        }
        return $query;

    }

    public  static  function  SelectPEcourse($table)
    {

        $query=DB::query(Database::SELECT,"select * from course where PropertyId = 3 and courseId not in (select courseId from courseselection_stu where studentId = ".$_COOKIE['id'].")")->execute()->as_array();
        for ($i=0;$i<sizeof($query);$i++) {
            $teachername = DB::query(Database::SELECT,"select teacher.name from courseselection_tea,teacher where courseselection_tea.courseId=".$query[$i]['courseId']." and teacher.teacherId = courseselection_tea.teacherId" )->execute()->as_array();
            $query[$i]['teachername'] = '';
            foreach ($teachername as $teachervalue)
                $query[$i]['teachername'] = $query[$i]['teachername'].$teachervalue['name']." ";

            $classinf = DB::query(Database::SELECT,"select workout_course.weeknum,workout_course.startsection,workout_course.endsection,classroom.Place from workout_course,classroom where workout_course.courseId=".$query[$i]['courseId']." and workout_course.classroomid = classroom.Id")->execute()->as_array();
            $query[$i]['Place'] = '';
            $query[$i]['weeknum'] = '';
            foreach ($classinf as $classvalue) {
                $query[$i]['Place'] = $query[$i]['Place'] . $classvalue['Place'] . " ";
                $query[$i]['weeknum'] = $query[$i]['weeknum'] ."周".$classvalue['weeknum'].":".$classvalue['startsection']."-".$classvalue['endsection']."节;";
            }
        }
        return $query;

    }

    public static function courseInsert($data){
        $select = DB::query(Database::SELECT,'select * from courseselection_stu where studentId='.$_COOKIE['id'].' and courseId='.$data)->execute()->as_array();
        if(sizeof($select)!=1) {
            $query = DB::query(Database::INSERT, 'insert into courseselection_stu(studentId,courseId) values (' . $_COOKIE['id'] . ',' . $data . ')')->execute();
            $up = DB::query(Database::UPDATE,'update course set margin=margin-1 where courseId='.$data)->execute();
            return $query;
        }
    }

    public static function courseDelete($data){
        $select = DB::query(Database::SELECT,'select * from courseselection_stu where studentId='.$_COOKIE['id'].' and courseId='.$data)->execute()->as_array();
        if(sizeof($select)==1) {
            $query = DB::query(Database::DELETE,'delete from courseselection_stu where studentId='.$_COOKIE['id'].' and courseId='.$data)->execute();
            $down = DB::query(Database::UPDATE,'update course set margin=margin+1 where courseId='.$data)->execute();
            return $query;
        }
    }
}