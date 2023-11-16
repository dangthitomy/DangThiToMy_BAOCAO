<?php

use App\Models\User;

$id = $_REQUEST['id'];
$customer =  User::find($id);
if($customer==null){
    header("location:index.php?option=customer");
}
//
$customer->delete();
header("location:index.php?option=customer&cat=trash");