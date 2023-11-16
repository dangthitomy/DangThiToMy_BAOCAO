<?php

use App\Models\Topic;

$list = Topic::where('status', '=', 0)->orderBy('Created_at', 'DESC')->get();

?>

<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=topic&cat=process" method="post" enctype="multipart/form-data">

   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Thùng rác chủ đề</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header">
               <div class="row">
                  <!-- <div class="col-md-6">
                     <a href="index.php?option=topic&cat=delete&id=" class="btn btn-sm btn-danger">
                        Xóa chủ đề
                     </a>
                  </div> -->
                  <div class="col-md">
                     <a href="index.php?option=topic" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về danh sach chủ đề
                     </a>
                  </div>
               </div>

            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-12">
                     <table class="table table-bordered">
                        <thead>
                           <tr>
                              <th class="text-center" style="width:30px;">
                                 <input type="checkbox">
                              </th>
                              <th class="text-center">Tên chủ đề</th>
                              <th class="text-center">Tên slug</th>
                              <th class="text-center">ID</th>
                              <th class="text-center">chức năng</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if (count($list) > 0) : ?>
                              <?php foreach ($list as $item) : ?>
                                 <tr class="datarow">
                                    <td>
                                       <input type="checkbox">
                                    </td>
                                    <td class="text-center">
                                       <div class="name">
                                          <?= $item->name; ?>
                                       </div>
                                    </td>
                                    <td class="text-center">
                                       <div class="slug">
                                          <?= $item->slug; ?>
                                       </div>
                                    </td>
                                    <td class="text-center">
                                       <div class="id">
                                          <?= $item->id; ?>
                                       </div>
                                    </td>
                                    <td class="text-center">
                                       <a href="index.php?option=topic&cat=restore&id=<?= $item->id; ?>" class="btn btn-sm btn-info">
                                          <i class="fas fa-undo"></i> Khôi Phục
                                       </a>
                                       <a href="index.php?option=topic&cat=destroy&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
                                          <i class="fas fa-trash"></i> Xóa VV
                                       </a>
                                    </td>
                                 </tr>
                              <?php endforeach; ?>
                           <?php endif; ?>
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
<?php require_once "../views/backend/footer.php"; ?>