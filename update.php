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
include 'validate.php';
if($error)
{
    echo "<div class='text-center'><button class='btn btn-info'><a href='search.php' class='text-white '>بازگشت</a></button></div>";
}
else
{
    extract($_REQUEST , EXTR_PREFIX_SAME , "dup");

    include 'db_info.php';
    try {


        include 'connection_db.php';

        $sql = $conn->prepare("UPDATE users SET name=?,family=?,phon_number=?,age=?,gender=?
                                WHERE id=?");

        $sql->bindParam(1, $name);
        $sql->bindParam(2, $family);
        $sql->bindParam(3, $phon_number);
        $sql->bindParam(4, $age);
        $sql->bindParam(5, $gender);
        $sql->bindParam(6, $id);
        $sql->execute();

        echo "<h3 class='text-primary text-center m-5'>اطلاعات کاربر با موفقیت آبدیت شد</h3>
          <div class='text-center'> 
                <button class='btn btn-info '><a href='search.php' class='text-white'>بازگشت</a></button>
          </div>";
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

}
