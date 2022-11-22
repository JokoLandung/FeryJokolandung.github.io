<?php
$conn = new mysqli("localhost", "root", "", "cars");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
$out = array('error' => false);
 
$crud = 'read';
 
if(isset($_GET['crud'])){
    $crud = $_GET['crud'];
}
 
 
if($crud == 'read'){
    $sql = "select * from cars";
    $query = $conn->query($sql);
    $cars = array();
 
    while($row = $query->fetch_array()){
        array_push($cars, $row);
    }
 
    $out['cars'] = $cars;
}
 
if($crud == 'create'){
 
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $price = $_POST['price'];
 
    $sql = "insert into cars (brand, model, price) values ('$brand', '$model', '$price')";
    $query = $conn->query($sql);
 
    if($query){
        $out['message'] = "Car Added Successfully";
    }
    else{
        $out['error'] = true;
        $out['message'] = "Could not add Car";
    }
     
}
 
if($crud == 'update'){
 
    $memid = $_POST['memid'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $price = $_POST['price'];
 
    $sql = "update cars set brand='$brand', model='$model', price='$price' where memid='$memid'";
    $query = $conn->query($sql);
 
    if($query){
        $out['message'] = "Car Updated Successfully";
    }
    else{
        $out['error'] = true;
        $out['message'] = "Could not update Car";
    }
     
}
 
if($crud == 'delete'){
 
    $memid = $_POST['memid'];
 
    $sql = "delete from cars where memid='$memid'";
    $query = $conn->query($sql);
 
    if($query){
        $out['message'] = "Car Deleted Successfully";
    }
    else{
        $out['error'] = true;
        $out['message'] = "Could not delete Car";
    }
     
}
 
 
$conn->close();
 
header("Content-type: application/json");
echo json_encode($out);
die();
?>