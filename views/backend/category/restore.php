<?php

use App\Models\Category;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$category =  Category::find($id);
if($category==null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=category&cat=trash");
}
//
$category->status =2;
$category->updated_at = date('Y-m-d H:i:s');
$category->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$category->save();
MyClass::set_flash('message',['msg'=>'Khôi phục thành công','type'=>'success']);
header("location:index.php?option=category&cat=trash");