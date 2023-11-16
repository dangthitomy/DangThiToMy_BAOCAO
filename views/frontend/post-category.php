<?php
use App\Models\Post;
//&cat=gioi-thieu
$slug = $_REQUEST['cat'];
$post = Post::where([['slug','=',$slug],['type','=','post'],['status','=',1]])
->first();
?>
<?php require_once"views/frontend/header.php";?>
   <section class="bg-light">
      <div class="container">
         <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb py-2 my-0">
               <li class="breadcrumb-item">
                  <a class="text-main" href="index.php">Trang chủ</a>
               </li>
               <li class="breadcrumb-item active" aria-current="post">
                  Bài viết
               </li>
            </ol>
         </nav>
      </div>
   </section>
   <section class="hdl-maincontent py-2">
      <div class="container">
         <div class="row">
            <div class="col-md-3 order-2 order-md-1">
               <ul class="list-group mb-3 list-page">
                  <li class="list-group-item bg-main py-3">Các bài viết khác</li>
                  <li class="list-group-item">
                  <a href="index.php?option=post&cat=tong-hop-cac-cong-thuc-tinh-phan-tram-tang-giam-gia-san-pham">Tổng hợp các công thức tính phần trăm (%) tăng giảm giá sản phẩm</a>
                  </li>
                  <li class="list-group-item">
                  <a href="index.php?option=post&cat=huong-dan-mo-cua-hang-sua-chua-dien-thoai-tu-a-den-z">Hướng dẫn mở cửa hàng sửa chữa điện thoại từ A đến Z</a>
                  </li>
                  <li class="list-group-item">
                  <a href="index.php?option=post&cat=bi-quyet-kinh-doanh-hoa-kho-dat-khach-thu-hoi-von-nhanh">Bí quyết kinh doanh hoa khô đắt khách, thu hồi vốn nhanh</a>
                  </li>
                  <li class="list-group-item">
                  <a href="index.php?option=post&cat=kinh-nghiem-mo-cua-hang-cho-thue-sach-truyen-ma-ban-nen-biet">Kinh nghiệm mở cửa hàng cho thuê sách truyện mà bạn nên biết</a>
                  </li>
               </ul>
            </div>
            <div class="col-md-9 order-1 order-md-2">
               <h1 class="fs-2 text-main"><?=$post->title; ?></h1>
               <p>
                  <?=$post->detail; ?>
               </p>
            </div>
         </div>
      </div>
   </section>
<?php require_once"views/frontend/footer.php";?>