<?php

use App\Models\Product;
use App\Models\Category;
use App\Libraries\MyClass;

$slug = $_REQUEST['slug'];
$pro = Product::where([['status', '=', 1], ['slug', '=', $slug]])
   ->first();
$title = $pro->name;
$catid = $pro->category_id;
$list_id = array();
array_push($list_id, $catid);
$list_category1 = Category::where([['parent_id', '=', $catid], ['status', '=', 1]])
   ->orderBy('sort_order', 'ASC')
   ->select('id')
   ->get();
if (count($list_category1) > 0) {
   foreach ($list_category1 as $cat1) {
      array_push($list_id, $cat1->id);
      $list_category2 = Category::where([['parent_id', '=', $cat1->id], ['status', '=', 1]])
         ->orderBy('sort_order', 'ASC')
         ->select('id')
         ->get();
      if (count($list_category2) > 0) {
         foreach ($list_category2 as $cat2) {
            array_push($list_id, $cat2->id);
         }
      }
   }
}


$list_other = Product::where([['status', '=', 1], ['id', '!=', $pro->id]])
   ->whereIn('category_id', $list_id)
   ->orderBy('created_at', 'DESC')
   ->limit(8)
   ->get();
//&slug=quan-jean-nam-slimfit-totoday-10203
?>
<?php require_once "views/frontend/header.php"; ?>
<section class="bg-light">
   <div class="container">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
         <ol class="breadcrumb py-2 my-0">
            <li class="breadcrumb-item">
               <a class="text-main" href="index.php">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
               <?= $pro->name; ?>
            </li>
         </ol>
      </nav>
   </div>
</section>
<section class="hdl-maincontent py-2">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <div class="image">
               <img id="productimage" class="img-fluid w-100" src="public/images/product/<?= $pro->image; ?>" alt="">
            </div>
            <div class="list-image mt-3">
               <div class="row">
                  <div class="col-3">
                     <img class="img-fluid w-100" src="public/images/product/<?= $pro->image; ?>" alt="" onclick="changeimage(src)">
                  </div>
                  <div class="col-3">
                     <img class="img-fluid" src="public/images/product/<?= $pro->image; ?>" alt="" onclick="changeimage(src)">
                  </div>
                  <div class="col-3">
                     <img class="img-fluid" src="public/images/product/<?= $pro->image; ?>" alt="" onclick="changeimage(src)">
                  </div>
                  <div class="col-3">
                     <img class="img-fluid" src="public/images/product/<?= $pro->image; ?>" alt="" onclick="changeimage(src)">
                  </div>
               </div>
            </div>
            <script>
               function changeimage(src) {
                  document.getElementById("productimage").src = src;
               }
            </script>
         </div>
         <div class="col-md-6">
            <h1 class="text-main"> <?= $pro->name; ?> </h1>
            <h3 class="fs-5">
               <?= MyClass::word_limit($pro->detail, 30); ?>
            </h3>
            <h2 class="text-main py-4">Giá: <?= number_format($pro->price); ?>VND</h2>
            <div class="mb-3">
               <label for="">Số lượng</label>
               <input type="number" value="1" name="qty" id="qty" class="form-control" style="width:200px">
            </div>
            <div class="mb-3">
               <a class="btn btn-main" href="checkout.html">Mua ngay</a>
               <button class="btn btn-main" onclick="addcart(<?= $pro->id; ?>)">
                  <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                  Thêm vào giỏ hàng</button>
            </div>
         </div>
      </div>
      <div class="row">
         <h2 class="text-main fs-4 pt-4">Chi tiết sản phẩm</h2>
         <p>
            <?= $pro->detail; ?>
         </p>
      </div>
      <?php if (count($list_other) > 0) : ?>
         <div class="row">
            <h2 class="text-main fs-4 pt-4">Sản phẩm khác</h2>
            <div class="product-category mt-3">
               <div class="row product-list">
                  <?php foreach ($list_other as $product) : ?>
                     <div class="col-6 col-md-3 mb-4">
                        <?php require 'views/frontend/product-item.php'; ?>
                     </div>
                  <?php endforeach; ?>
               </div>
            </div>
         </div>
      <?php endif; ?>
   </div>
</section>
<script>
   function addcart(id) {
      const qty = document.getElementById("qty").value;
      $.ajax({
         url: "index.php?option=cart&addcart=true",
         type: "GET",
         data: {
            id:id,
            qty:qty
         },
         success: function(result) {
            $("#showcart").html(result);
         }
      });
   }
</script>
<?php require_once "views/frontend/footer.php"; ?>