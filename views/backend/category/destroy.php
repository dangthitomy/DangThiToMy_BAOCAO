<?php

use App\Models\Category;

$id = $_REQUEST['id'];
$category = Category::find($id);
if($category==null){
    header("location:index.php?option=category&cat=trash");
}
$category->delete();// xóa vv
header("location:index.php?option=category&cat=trash");