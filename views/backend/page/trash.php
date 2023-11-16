<?php

use App\Models\Post;

$list = Post::where([['status', '=', 0], ['type', '=', 'page']])
   ->orderBy('created_at', 'desc')
   ->get();
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=page&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Thùng rác trang đơn</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header p-2">
               <div class="row">
                  <div class="col-md">
                     <a href="index.php?option=page" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về danh sách
                     </a>
                  </div>
               </div>
            </div>
            <div class="card-body p-2">
               <table class="table table-bordered" id="mytable">
                  <thead>
                     <tr>
                        <th class="text-center" style="width:30px;">
                           <input type="checkbox">
                        </th>
                        <th class="text-center" style="width:130px;">Hình ảnh</th>
                        <th class="text-center">Tiêu đề bài viết</th>
                        <th class="text-center">Chủ đề</th>
                        <th class="text-center">Ngày tạo</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">Chức năng</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if (count($list) > 0) : ?>
                        <?php foreach ($list as $item) : ?>
                           <tr class="datarow">
                              <td>
                                 <input type="checkbox">
                              </td>
                              <td>
                                 <img class="img-fluid" src="../public/images/post/<?= $item->image; ?>" alt="<?= $item->image; ?>" style="width:70px; height:100px;">
                              </td>
                              <td>
                                 <div class="title">
                                    <?= $item->title; ?>
                                 </div>
                              </td>
                              <td>
                                 <div class="topic_id">
                                    <?= $item->topic_id; ?>
                                 </div>
                              </td>
                              <td>
                                 <div class="created_at">
                                    <?= $item->created_at; ?>
                                 </div>
                              </td>
                              <td>
                                 <div class="id">
                                    <?= $item->id; ?>
                                 </div>
                              </td>
                              <td>
                                 <a href="index.php?option=page&cat=restore&id=<?= $item->id; ?>" class="btn btn-sm btn-info">
                                    <i class="fas fa-undo"></i>
                                 </a>
                                 <a href="index.php?option=page&cat=show&id=<?= $item->id; ?>" class="btn btn-sm btn-primary">
                                    <i class="far fa-eye"></i>
                                 </a>
                                 <a href="index.php?option=page&cat=destroy&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                 </a>
                              </td>
                           </tr>
                        <?php endforeach; ?>
                     <?php endif; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>