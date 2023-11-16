<?php

use App\Models\Menu;

$id = $_REQUEST['id'];
$menu =  Menu::find($id);
if ($contact == null) {
    header("location:index.php?option=menu&cat=restore");
}
//
$menu->status = 2;
$menu->updated_at = date('Y-m-d H:i:s');
$menu->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$menu->save();
header("location:index.php?option=menu&cat=restore");