<?php

use App\Libraries\Cart;

$id = $_REQUEST['deletecart'];
Cart::deleteCart($id);
header("location:index.php?option=cart");