<?php

use App\Models\customer;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$customer =  customer::find($id);
if($customer==null){
    MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'denger']);
    header("location:index.php?option=customer");
}
//
$customer->status =($customer->status == 1) ? 2 : 1;
$customer->updated_at = date('Y-m-d H:i:s');
$customer->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$customer->save();
MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'success']);
header("location:index.php?option=customer");