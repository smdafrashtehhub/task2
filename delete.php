<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.rtl.min.css">
</head>
<body>

</body>
</html>
<?php
session_start();
extract($_REQUEST , EXTR_PREFIX_SAME , "dup");

include 'db_info.php';
try {
    include 'connection_db.php';
    $sql = $conn->prepare("DELETE FROM users where id=?");
    $id=$_SESSION['id'];
    $sql->bindParam(1, $id);
    $sql->execute();

    echo "<h3 class='text-primary text-center m-5'> کاربر  با موفقیت حذف شد</h3>
          <div class='text-center'> 
                <button class='btn btn-info '><a href='search.php' class='text-white'>بازگشت</a></button>
          </div>
";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
session_unset();
session_destroy();