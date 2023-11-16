<?php

use App\Models\User;

$id = $_REQUEST['id'];
$user =  User::find($id);
if($user==null){
    header("location:index.php?option=user&cat=trash");
}
//
$user->status =2;
$user->updated_at = date('Y-m-d H:i:s');
$user->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$user->save();
header("location:index.php?option=user&cat=trash");