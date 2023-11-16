<?php

use App\Models\Banner;

$id = $_REQUEST['id'];
$banner =  Banner::find($id);
if($banner==null){
    header("location:index.php?option=banner");
}
//
$banner->status =0;
$banner->updated_at = date('Y-m-d H:i:s');
$banner->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$banner->save();
header("location:index.php?option=banner");