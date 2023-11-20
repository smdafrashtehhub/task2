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
<div class="container col-3 text-center">
    <h3 class=" bg-danger mt-4 text-white " style="border-radius: 1rem; padding: .2rem">جستجوی کاربر </h3>
    <form action="#" method="post" class="m-4">
        <div class="m-4 ">
            <label for="search" class="form-label">کد کاربری را وارد کنید :  </label>
            <input type="text" name="search" class="form-control">
        </div>
        <div class="m-4 ">
            <button type="submit" class="btn btn-primary col-12">جستجو</button>
        </div>
    </form>
</div>
</body>
</html>



<?php
extract($_REQUEST , EXTR_PREFIX_SAME , "dup");

include 'db_info.php';

try {
    include 'connection_db.php';

    $sql = $conn->prepare("SELECT * FROM users WHERE id=?");

    $id=$_REQUEST['search'];
    $sql->bindParam(1, $id);
    $sql->execute();
    $result = $sql->fetchAll(\PDO::FETCH_ASSOC);
    foreach ($result as $user) {
        session_start();
        $_SESSION['id']=$user['id'];
        echo "<table class='table table-hover table-striped table-bordered text-center '>";
        echo "<thead>
                <tr>
                <th>کد کاربری</th>
                <th>نام</th>
                <th>فامیلی</th>
                <th>شماره تلفن</th>
                <th>سن</th>
                <th>جنسیت</th>
               <th>عملیات</th>
               <tr>
          </thead>
          <tbody>
                <tr><td>".$user['id']."</td>
                <td>".$user['name']."</td>
                <td>".$user['family']."</td>
                <td>".$user['phon_number']."</td>
                <td>".$user['age']."</td>
                <td>".$user['gender']."</td>
                <td ><button class='btn btn-danger '><a href='delete.php' class='text-white link-underline '>حذف</a></button>
                <button class='btn btn-info'><a href='edit.php' class='text-white '>ویرایش</a></button>
                </td>
        </tbody>
        </table>";
        }
    if($result==NULL)
    {
        echo "<h3 class='text-primary text-center m-5'> کاربر با مشخصات موردنظر وجود ندارد</h3>";

    }
    else
        echo "<h3 class='text-primary text-center m-5'> کاربر  با موفقیت پیدا شد</h3>";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
