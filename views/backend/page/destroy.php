<?php

use App\Models\Post;

$id = $_REQUEST['id'];
$page = Post::find($id);
if($page==null){
    header("location:index.php?option=page&cat=trash");
}
$page->delete();// xóa trong bảng database
header("location:index.php?option=page&cat=trash");