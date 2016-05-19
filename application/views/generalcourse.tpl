<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>getStuById</title>
    <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../resource/bootstrap-table-master/src/bootstrap-table.css">
    <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap-theme.min.css">
    <script src="../../resource/bootstrap/js/jquery.min.js"></script>
    <script src="../../resource/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../resource/bootstrap-table-master/src/bootstrap-table.js"></script>
    <script src="../../resource/bootstrap-table-master/src/extensions/export/bootstrap-table-export.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="page-header">
                <h1>
                    教务管理系统
                </h1>
            </div>
            <div>
                <table class="table">
                    <thead>

                    </thead>
                    <tbody>
                    <{$value=Student::getStudentById()}>
                    <{foreach from=$value item=t}>
                        <tr>
                            <td>
                                <span style="background-color: #1A5CC6;font-size: 18px"> <b> &nbsp网上选课 &nbsp</b>  </span>
                            </td>
                            <td>
                                学号：<{$t['studentId']}>
                            </td>
                            <td>
                                姓名：<{$t['name']}>
                            </td>
                            <td>
                                班级：<{$t['class']}>
                            </td>
                        </tr>
                        <{/foreach}>
                    </tbody>
                </table>

            </div>
        </div>
        <table
                id="table"
                data-toggle="table"
                data-show-export="true"
                data-pagination="true"
                data-click-to-select="true"
                data-toolbar="#toolbar"
                class="table table-condensed table-bordered">
            <thead>
            <tr>
                <th data-field="state" data-checkbox="true"></th>
                <th data-field="courseId">
                    课程代码
                </th>
                <th data-field="name">
                    课程名称
                </th>
                <th data-field="property">
                    课程性质
                </th>
                <th data-field="direction">
                    专业方向
                </th>
                <th data-field="credit">
                    学分
                </th>
                <th data-field="classhour">
                    周学时
                </th>
                <th data-field="teachername">
                    教师姓名
                </th>
                <th data-field="weeknum">
                    上课时间
                </th>
                <th data-field="Place">
                    上课地点
                </th>
                <th data-field="testtime">
                    考试时间
                </th>
                <th data-field="capacity">
                    容量
                </th>
                <th data-field="margin">
                    余量
                </th>
                <th data-field="belong">
                    课程归属
                </th>
                <th data-field="campus">
                    校区代码
                </th>
                <th data-field="collegeId">
                    开课学院
                </th>

            </tr>
            </thead>
        </table>
    </div>
    <div class="form-group" style="float: right ">
        <button id="school_select" type="button" class="btn btn-primary" onclick="submit()">提交</button>
    </div>
</div>
</div>
<div>
    <div class="form-group" style="float: right">
        <button id="major_select" type="button" class="btn btn-primary" onclick="thecourseofprofession()">专业选课</button>
        <button id="school_select" type="button" class="btn btn-primary" onclick="thecourseofgeneral()">校选课</button>
        <button id="PE_select" type="button" class="btn btn-primary" onclick="thecourseofPE()">体育选课</button>
        <button id="cancel_select" type="button" class="btn btn-primary" onclick="cancel_select()">退选课程</button>
        <button id="check_select" type="button" class="btn btn-primary" onclick="login()">查看课表</button>
    </div>
</div>
<script>
    var $table = $('#table');
    $(function () {
        fresh();
    });
    function fresh() {
        $.ajax({
            url: "/generalcourse/majorselect",
            type:"get",
            success: successCallback,
            error: errorCallback
        });
    }
    function successCallback(json){
        json = $.parseJSON(json);
        $table.bootstrapTable('load', json);
    }
    function errorCallback() {
        alert("查询出现错误: ");
    }
    function submit() {
        var post_Data = [];
        var data = $table.bootstrapTable('getSelections');
        for(var i= 0;i<data.length;i++)
            post_Data.push({data:data[i]["courseId"]});
        $.ajax({
            url:"/generalcourse/courseapi",
            type:"post",
            data:{data:post_Data},
            success:submit_success,
            error:submit_error
        });
    }
    function submit_success() {
        alert("选课成功");
        fresh();
    }
    function submit_error() {
        alert("选课失败")
    }
</script>

<script>
    function thecourseofprofession()
    {
        window.location.href = 'profession';
    }

    function thecourseofgeneral()
    {
        window.location.href = 'generalcourse';
    }

    function thecourseofPE()
    {
        window.location.href = 'PEcourse';
    }

    function cancel_select()
    {
        window.location.href = 'deletecourse';
    }

</script>
</body>
</html>