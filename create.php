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

    <div class="container col-3">
        <h3 class="text-center bg-danger mt-4 text-white " style="border-radius: 1rem; padding: .2rem">ایجاد کاربر </h3>
        <form action="insert.php" method="post">
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">نام</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3 mt-3">
                <label for="family" class="form-label">نام خانوادگی</label>
                <input type="text" class="form-control"  name="family">
            </div>
            <div class="mb-3 mt-3">
                <label for="phon_number" class="form-label">تلفن</label>
                <input type="text" class="form-control" name="phon_number">
            </div>
            <div class="mb-3 mt-3">
                <label for="age" class="form-label">سن</label>
                <input type="text" class="form-control" name="age">
            </div>
            <div class="mb-3 mt-3">
                <label for="password" class="form-label">رمز عبور</label>
                <input type="text" class="form-control" name="password">
            </div>
            <div class="mb-3 mt-3">جنسیت
                <select class="form-select form-select" name="gender">
                    <option >مرد</option>
                    <option >زن</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary col-12">ذخیره</button>
            <br>
        </form>

    </div>
</body>
</html>
<?php
