<?php
include 'connection_inc.php';
if($_GET['un']){
    $un=$_GET['un'];
    $sql=mysqli_query($con,"DELETE FROM appoinment_mst WHERE email='$un'");
    header('location:receive_appointment.php');
}
else if($_GET['en']){
    $en=$_GET['en'];
    $sql=mysqli_query($con,"DELETE FROM employee_mst WHERE ename='$en'");
    header('location:employee.php');
}
else if($_GET['sn']){
    $sn=$_GET['sn'];
    $sql=mysqli_query($con,"DELETE FROM services WHERE sname='$sn'");
    header('location:services.php');
}
else if($_GET['id']){
    $id=$_GET['id'];
    $sql=mysqli_query($con,"DELETE FROM report WHERE id='$id'");
    header('location:invoice.php');
}
?>