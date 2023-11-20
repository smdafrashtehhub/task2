<!doctype html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap.rtl.min.css">
</head>
<body>

</body>
</html>
<?php
extract($_REQUEST , EXTR_PREFIX_SAME , "dup");

include 'db_info.php';
try {
    include 'connection_db.php';

    $sql = $conn->prepare("SELECT * FROM users ORDER BY id desc");

    $sql->execute();
    $result = $sql->fetchAll(\PDO::FETCH_ASSOC);

    echo "<div class='container text-center'>
<h3 class='m-5 bg-dark-subtle col-3 p-1 '> جدول اطلاعات کاربران</h3>

<table class='table table-hover table-striped table-bordered text-center '>";
        echo "<thead>
                <tr>
                <th>کد کاربری</th>
                <th>نام</th>
                <th>فامیلی</th>
                <th>شماره تلفن</th>
                <th>سن</th>
                <th>جنسیت</th>
               <tr>
          </thead>";

    foreach ($result as $item) {

        echo
          "<tbody>
                <tr><td class='text-danger'>".$item['id']."</td>
                <td class='text-info'>".$item['name']."</td>
                <td class='text-danger'>".$item['family']."</td>
                <td class='text-info'>".$item['phon_number']."</td>
                <td class='text-danger'>".$item['age']."</td>
                <td class='text-info'>".$item['gender']."</td>
                </tr>
        </tbody>";

    }
    echo "</table></div>";
    echo "<h3 class='text-primary text-center m-5'> اطلاعات کاربران  با موفقیت نمایش داده شد</h3>";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}







