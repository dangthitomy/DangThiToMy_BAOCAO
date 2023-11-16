<?php 
use App\Models\Brand;
$mod_list_brand = Brand::where('status','=',1)
->orderBy('sort_order','ASC')
->select('name','slug')
->get();
?>
<ul class="list-group mb-3 list-brand">
    <li class="list-group-item bg-main py-3">Danh mục thương hiệu</li>
    <?php foreach($mod_list_brand as $mod_row_brand): ?>
    <li class="list-group-item">
        <a href="index.php?option=brand&cat=<?= $mod_row_brand->slug;?>"><?=
        $mod_row_brand->name;?></a>
    </li>
    <?php endforeach; ?>
</ul>