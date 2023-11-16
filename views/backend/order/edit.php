<?php
use App\Models\Order;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$brand = Order::find($id);
if($brand==null)
{
   MyClass ::set_flash('message',['msg'=>'Lỗi trang 404 ','type'=>'danger']);
    header("location:index.php?option=order");
}
$list = Order::where('status','!=',0)
   ->orderBy('created_at','DESC')
   ->get();
?>
<?php require_once '../views/backend/header.php'; ?>

      <!-- CONTENT -->
<form action ="index.php?option=order&cat=process" method="post" enctype="multipart/form-data">
<div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Cập nhật order</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
                  <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                     <i class="fa fa-save" aria-hidden="true"></i>
                     Lưu
                  </button>
                  <a href="index.php?option=order" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="mb-3">
                          <input type="hidden" name="id" value="<?= $brand->id; ?>"/>
                           <label> Tên Banner (*)</label>
                           <input type="text" value="<?=$brand->name; ?>" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Slug</label>
                           <input type="text" value="<?=$brand->slug; ?>"  name="slug" class="form-control">
                        </div>
                        </div class="mb-3">
                         <label>Mô tả</label>
                         <textarea name="description" class="form-control"><?=$brand->description; ?></textarea>
                     </div>
                         </label>
                        <div class="mb-3">
                           <label>Hình đại diện</label>
                           <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1" <?=($brand->status==1)?'selected' : ''; ?>>Xuất bản</option>
                              <option value="2" <?=($brand->status==2)?'selected' : ''; ?>>Chưa xuất bản</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-8">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th class="text-center" style="width:30px;">
                                    <input type="checkbox">
                                 </th>
                                 <th class="text-center" style="width:130px;">Hình ảnh</th>
                                 <th>Tên Banner</th>
                                 <th>Tên slug</th>
                              </tr>
                           </thead>
                           <tbody>
                          <?php if(count($list) > 0) : ?>
                              <?php foreach($list as $item   ):?>
                              <tr class="datarow">  
                                 <td>
                                    <input type="checkbox">
                                 </td>
                                 <td>
                                    <img src="../public/images/" alt="">
                                 </td>
                                 <td>
                                    <div class="name">
                                      <?= $item->name ; ?> 
                                    </div>
                                    <div class="function_style">
                                       <?php if ($item->status == 1) : ?>
                                    <a href="index.php?option=order&cat=status&id=<?=$item->id;?>" class="btn btn-success btn-xs">
                                       <i class="fas fa-toggle-on"></i> Hiện
                                    </a> 
                                    <?php else : ?>
                                    <a href="index.php?option=order&cat=status&id=<?=$item->id;?>" class="btn btn-danger btn-xs">
                                       <i class="fas fa-toggle-off"></i>Ẩn
                                    </a> 
                                    <?php endif ; ?>
                                    <a href="index.php?option=order&cat=edit&id=<?=$item->id;?>" class="btn btn-primary btn-xs">
                                       <i class="fas fa-edit"></i> Chỉnh sửa
                                    </a> |
                                    <a href="index.php?option=order&cat=show&id=<?=$item->id;?>"  class="btn btn-info btn-xs">
                                       <i class="fas fa-eye"></i> Chi tiết
                                    </a> |
                                    <a href="index.php?option=order&cat=delete&id=<?=$item->id;?>" class="btn btn-danger btn-xs">
                                       <i class="fas fa-trash"></i>Xoá
                                    </a>
                                    </div>
                                 </td>
                                 <td><?= $item->slug?></td>
                              </tr>
                              <?php endforeach;?>
                              <?php endif;?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
</form>
      <!-- END CONTENT-->
      <?php require_once '../views/backend/footer.php'; ?>
