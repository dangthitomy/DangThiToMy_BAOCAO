<?php
use App\Libraries\Pagination;
use App\Models\Category;
use App\Models\Product;

$limit = 8;
$current = Pagination::pageCurrent();
$offset = Pagination::pageOffset($current, $limit);

$slug = $_REQUEST['cat'];
$cat = Category::where([['status','=',1],['slug','=',$slug]])
->select('id','name')
->first();
$list_id = array();
array_push($list_id,$cat->id);
$list_category1 = Category::where([['parent_id','=',$cat->id],['status','=',1]])
->orderBy('sort_order','ASC')
->select('id')
->get();
if(count($list_category1)>0)
{
    foreach($list_category1 as $cat1 )
    {
        array_push($list_id,$cat1->id);
        $list_category2 = Category::where([['parent_id','=',$cat1->id],['status','=',1]])
            ->orderBy('sort_order','ASC')
            ->select('id')
            ->get();
            if(count($list_category2)>0)
            {
                foreach($list_category2 as $cat2 )
                {
                    array_push($list_id,$cat2->id);
                }
            }
    }
}


$list_product = Product::where('status','=',1)
->whereIn('category_id',$list_id)
->orderBy('created_at','DESC')
->skip($offset)
->limit($limit)
->get();
$total = Product::where('status', '=', 1)
->whereIn('category_id',$list_id)
->count();

?>
<?php require_once"views/frontend/header.php";?>
   <section class="bg-light">
      <div class="container">
         <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb py-2 my-0">
               <li class="breadcrumb-item">
                  <a class="text-main" href="index.html">Trang chủ</a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">
                  <?=$cat->name; ?>
               </li>
            </ol>
         </nav>
      </div>
   </section>
   <section class="hdl-maincontent py-2">
      <div class="container">
         <div class="row">
            <div class="col-md-3 order-2 order-md-1">
            <?php require_once"views/frontend/mod-listcategory.php";?>
            <?php require_once"views/frontend/mod-listbrand.php";?>
            <?php require_once"views/frontend/mod-product-new.php";?>
           
            </div>
            <div class="col-md-9 order-1 order-md-2">
               <div class="category-title bg-main">
                  <h3 class="fs-5 py-3 text-center"><?=$cat->name;?></h3>
               </div>
               <div class="product-category mt-3">
                  <div class="row product-list">
                  <?php foreach($list_product as $product): ?>
                            <div class="col-6 col-md-3 mb-4">
                        <?php require 'views/frontend/product-item.php'; ?>
                         </div>
                     <?php endforeach; ?>

                  </div>
               </div>
               <?= Pagination::pageLink($total, $current, $limit, 'index.php?option=product&cat='.$slug); ?>

            </div>
         </div>
      </div>
   </section>
<?php require_once"views/frontend/footer.php";?>