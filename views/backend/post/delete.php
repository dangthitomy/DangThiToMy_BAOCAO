<?php

use App\Models\Post;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$post =  Post::find($id);
if($post==null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=post");
}
//
$post->status =0;
$post->updated_at = date('Y-m-d H:i:s');
$post->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$post->save();
MyClass::set_flash('message',['msg'=>'Xóa thành công','type'=>'success']);
header("location:index.php?option=post");