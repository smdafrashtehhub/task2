<?php
$error=0;
$id=$_REQUEST['id'];
$name=$_REQUEST['name'];
$family=$_REQUEST['family'];
$phon_number=$_REQUEST['phon_number'];
$age=$_REQUEST['age'];
$password=$_REQUEST['password'];
$gender=$_REQUEST['gender'];
if($name=='')
{
    echo "<h3 class='text-primary text-center m-5'>نام کاربر را وارد کنید</h3>";
    $error=1;
}
else if(strlen($name) > 40)
{
    echo "<h3 class='text-primary text-center m-5'>نام کاربر باید کوچکتر از 40 کاراکتر باشد</h3>";
    $error=1;
}
if($family=='')
{
    echo "<h3 class='text-primary text-center m-5'>نام خانوادگی کاربر را وارد کنید</h3>";
    $error=1;
}
else if(strlen($family) > 40)
{
    echo "<h3 class='text-primary text-center m-5'>نام خانوادگی کاربر باید کوچکتر از 40 کاراکتر باشد</h3>";
    $error=1;
}
if($phon_number=='')
{
    echo "<h3 class='text-primary text-center m-5'>شماره تلفن کاربر را وارد کنید</h3>";
    $error=1;
}
elseif (strlen((string)$_REQUEST['phon_number'])>11 )
{
    echo "<h3 class='text-primary text-center m-5'>شماره تلفن کاربر باید کمتر از 11 عدد داشته باشد</h3>";
    $error=1;
}
if($age=='')
{
    echo "<h3 class='text-primary text-center m-5'>سن کاربر را وارد کنید</h3>";
    $error=1;
}
elseif ($age<18)
{
    echo "<h3 class='text-primary text-center m-5'>سن کاربر باید بیشتر از 18 سال باشد</h3>";
    $error=1;
}

?>