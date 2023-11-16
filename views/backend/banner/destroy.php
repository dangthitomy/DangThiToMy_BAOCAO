<?php

use App\Models\Banner;

$id = $_REQUEST['id'];
$banner =  Banner::find($id);
if($banner==null){
    header("location:index.php?option=banner");
}
//
$banner->delete();// xóa vv
header("location:index.php?option=banner&cat=trash");