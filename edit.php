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
session_start();

extract($_REQUEST , EXTR_PREFIX_SAME , "dup");

include 'db_info.php';

try {
    include 'connection_db.php';

    $sql = $conn->prepare("select * from users where id=? ");

    $id=$_SESSION['id'];
    $sql->bindParam(1, $id);
    $sql->execute();
    $result = $sql->fetchAll(\PDO::FETCH_ASSOC);
    foreach ($result as $user) {

        echo '
        <div class="container col-3">
        <h3 class="text-center bg-danger mt-4 text-white " style="border-radius: 1rem; padding: .2rem">ویرایش کاربر </h3>
    <form action="update.php" method="post">
        <div class="mb-3 mt-3 ">
            <label for="name" class="form-label">کد کاربری</label>
            <input type="text" class="form-control" name="id" value="' . $user['id'] . '" readonly>
        </div>
        <div class="mb-3 ">
            <label for="name" class="form-label">نام</label>
            <input type="text" class="form-control" name="name" value="' . $user['name'] . '">
        </div>
        <div class="mb-3 mt-3 ">
             <label for="family" class="form-label">نام خانوادگی</label>
             <input type="text" class="form-control"  name="family" value="' . $user['family'] . '">
        </div>
        <div class="mb-3 mt-3 ">
             <label for="phon_number" class="form-label">شماره تلفن</label>
             <input type="text" class="form-control" name="phon_number" value="' . $user['phon_number'] . '">
        </div>
        <div class="mb-3 mt-3 ">
             <label for="age" class="form-label">سن</label>
             <input type="text" class="form-control" name="age" value="' . $user['age'] . '">
        </div>
        
        

        <div class="mb-3 ">جنسیت 
            <select class="form-select form-select" name="gender">
                    <option ';if($user['gender']=='مرد')echo "selected";echo'>مرد</option>
                    <option ';if($user['gender']=='زن')echo "selected";echo'>زن</option>
            </select>
        </div>
<button type="submit" class="col-12 btn btn-primary">آبدیت</button>
<br>
</form>

</div>
';
    }
    echo "<h3 class='text-primary text-center m-5'> ویرایش کاربر با موفقیت اجرا شد</h3>";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
session_unset();
session_destroy();