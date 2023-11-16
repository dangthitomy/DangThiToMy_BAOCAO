
<?php
use App\Models\Product;
use App\Models\Category;
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
->limit(8)
->get();
// $cat->id
?>
<?php if(count($list_product)>0): ?>
 <div class="product-category mt-3">
            <div class="row">
               <div class="col-md-3">
                  <div class="category-title bg-main">
                     <h1 class="fs-5 py-3 text-center text-uppercase"><?=$cat->name;?></h1>
                     <img class="img-fluid d-none d-md-block" src="public/images/category/<?=$cat->image;?>"
                        alt="<?=$cat->image;?>">
                  </div>
               </div>
               <div class="col-md-9">
                    <div class="row product-list">
                        <?php foreach($list_product as $product): ?>
                            <div class="col-6 col-md-3 mb-4">
                        <?php require 'views/frontend/product-item.php'; ?>
                         </div>
                     <?php endforeach; ?>
                     </div>
               </div>
            </div>
</div>
<?php endif; ?>