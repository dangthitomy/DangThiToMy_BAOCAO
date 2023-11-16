<?php

use App\Models\User;

$id = $_REQUEST['id'];
$customer =  User::find($id);
if($customer==null){
    header("location:index.php?option=customer&cat=trash");
}
//
$customer->status =2;
$customer->updated_at = date('Y-m-d H:i:s');
$customer->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$customer->save();
header("location:index.php?option=customer&cat=trash");