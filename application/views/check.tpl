<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link rel="stylesheet" href="resource/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="resource/bootstrap-table-master/src/bootstrap-table.css">

    <script src="resource/bootstrap/js/jquery.min.js"></script>
    <script src="resource/bootstrap/js/bootstrap.min.js"></script>
    <script src="resource/bootstrap-table-master/src/bootstrap-table.js"></script>
    <script src="resource/bootstrap-table-master/src/extensions/export/bootstrap-table-export.js"></script>
</head>
<body>
<table id="table"
       data-toggle="table"
       data-show-export="true"
       data-pagination="true"
       data-click-to-select="true"
       data-toolbar="#toolbar">
    <thead>
    <tr>
        <th data-field="courseselection_Id">序号</th>
        <th data-field="studentId">学号</th>
        <th data-field="courseId">课程号</th>
        <th data-field="score">成绩</th>
    </tr>
    </thead>
</table>

序号：<input id = "sequence" type="text" name="courseselectionid" placeholder="序号">
学号：<input id = "number" type="text" name="studentid" placeholder="学号">
课程号：<input id = "course" type="text" name="courseid" placeholder="课程号">
<button id="pickup" type="button" onclick ="respons()">提交</button>

<script>
    var $table = $('#table');

        $(function () {
            reloadtable();
        });
        function reloadtable() {
            $.ajax({
                url: "/check/getcheck",
                success: success,
                error: error
            });
        }

        function success(json) {
            json = $.parseJSON(json);
            $table.bootstrapTable('load', json);
        }

        function error() {
            alert("查询出现错误: ");
        }

    function respons()
    {
        var data = {
            sequence: document.getElementById('sequence').value,
            number: document.getElementById('number').value,
            course: document.getElementById("course").value
        };
        $.ajax({
            url: "/course/courseapi",
            type:"post",
            data:data,
            success: successCallback,
            error: errorCallback
        });
        function successCallback(json){
            alert('插入成功');
            reloadtable();
        }
        function errorCallback(){
            alert('插入失败');
        }

    }
</script>
</body>
</html>