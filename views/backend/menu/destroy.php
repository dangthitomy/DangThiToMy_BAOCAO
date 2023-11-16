<?php

use App\Models\Menu;

$id = $_REQUEST['id'];
$brand = Menu::find($id);
if ($brand == null) {
    header("location:index.php?option=menu&cat=trash");
}
$brand->delete();
header("location:index.php?option=menu&cat=trash");