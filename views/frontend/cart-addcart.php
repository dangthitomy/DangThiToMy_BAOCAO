<?php

use App\Models\Product;
use App\Libraries\Cart;

if (isset($_REQUEST['addcart'])) 
{
    $id = $_GET['id'];
    $product = Product::find($id);

    $qty = $_GET['qty'];
    // lưu vào session
    $cart_item = [
        'id' => $id,
        'name' => $product->name,
        'price' => $product->pricesale,
        'qty' => $qty,
        'image' => $product->image
    ];
    Cart::addCart($cart_item);
    echo count($_SESSION['cart']);
}