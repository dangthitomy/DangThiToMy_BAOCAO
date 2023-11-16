<?php

use App\Models\order;

$id = $_REQUEST['id'];
$order =  order::find($id);
if($order==null){
    header("location:index.php?option=order");
}
//
$order->status =($order->status == 1) ? 2 : 1;
$order->updated_at = date('Y-m-d H:i:s');
$order->updated_by = (isset($_SESSION['order_id'])) ? $_SESSION['order_id'] : 1;
$order->save();
header("location:index.php?option=order");