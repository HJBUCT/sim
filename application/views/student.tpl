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
    <table id="table1"
           data-toggle="table"
           data-show-export="true"
           data-pagination="true"
           data-click-to-select="true"
           data-toolbar="#toolbar">
        <thead>
            <tr>
                <th>学号</th>
                <th>姓名</th>
            </tr>
        </thead>
        <body>
            <{$value=Student::getAllStudent()}>
            <{foreach from=$value item=t}>
                <tr class="gradeX">
                    <td class="hidden-xs"><{$t['studentId']}></td>
                    <td class="hidden-xs"><{$t['name']}></td>
                </tr>
            <{/foreach}>
        </body>
    </table>

    <table id="table"
           data-toggle="table"
           data-show-export="true"
           data-pagination="true"
           data-click-to-select="true"
           data-toolbar="#toolbar">
        <thead>
            <tr>
                <th data-field="studentId">学号</th>
                <th data-field="name">姓名</th>
            </tr>
        </thead>
    </table>
<script>
    var $table = $('#table');
    $(function () {
        $.ajax({
            url: "/student/getalluser",
            success: successCallback,
            error: errorCallback
        });
    });
    function successCallback(json){
        json = $.parseJSON(json);
        $table.bootstrapTable('load', json);
    }
    function errorCallback() {
        alert("查询出现错误: ");
    }
</script>
</body>
</html>