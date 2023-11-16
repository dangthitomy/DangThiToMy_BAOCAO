<?php

use App\Models\order;
use App\Libraries\MyClass;

if(isset($_POST['THEM']))
{
    $order=new order();
    //lấy từ form
    $order->User_id = $_POST['User_id'];
    $order->deliveryname = $_POST['deliveryname'];
    $order->deliveryphone = $_POST['deliveryphone'];
    $order->deliveryemail = $_POST['deliveryemail'];
    $order->deliveryaddress = $_POST['deliveryaddress'];
    $order->note = $_POST['note'];
    $order->status = $_POST['status'];  
    //Xử lí uploadfile

    //tư sinh ra
    $order->created_at = date('Y-m-d-H:i:s');

    var_dump($order);
     //lưu vào CSDL
    $order->save();
    //
    header("location:index.php?option=order");
}