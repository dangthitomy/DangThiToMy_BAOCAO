<?php

use App\Models\Topic;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$topic =  Topic::find($id);
if ($topic == null) {
   MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
   header("location:index.php?option=topic");
}
$list = topic::where('status', '=', 0)->orderBy('Created_at', 'DESC')->get();

?>

<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=topic&cat=process" method="post" enctype="multipart/form-data">

   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Chi tiết chủ đề</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header">
               <div class="row">

                  <div class="col-md-12">
                     <a href="index.php?option=topic" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về Chủ đề
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

                              <th>Tên Trường</th>
                              <th>Giá trị</th>
                           </tr>
                        </thead>
                        <tbody>

                           <tr>
                              <td>ID</td>
                              <td><?= $topic->id; ?></td>
                           </tr>
                           <tr>
                              <td>Tên chủ đề</td>
                              <td><?= $topic['name']; ?></td>
                           </tr>
                           <tr>
                              <td>slug</td>
                              <td><?= $topic['slug']; ?></td>
                           </tr>
                           <tr>
                              <td>Mã cấp cha</td>
                              <td><?= $topic->parent_id; ?></td>
                           </tr>
                           <tr>
                              <td>Từ khóa</td>
                              <td><?= $topic['metakey']; ?></td>
                           </tr>
                           <tr>
                              <td>Mô tả</td>
                              <td><?= $topic['metadesc']; ?></td>
                           </tr>
                           <tr>
                              <td>Sắp xếp</td>
                              <td><?= $topic->sort_order; ?></td>
                           </tr>
                           <tr>
                              <td>Ngày tạo</td>
                              <td><?= $topic->created_at; ?></td>
                           </tr>
                           <tr>
                              <td>Người tạo</td>
                              <td><?= $topic->created_by; ?></td>
                           </tr>
                           <tr>
                              <td>Ngày cập nhật</td>
                              <td><?= $topic->updated_at; ?></td>
                           </tr>
                           <tr>
                              <td>Người Cập nhật</td>
                              <td><?= $topic->updated_by; ?></td>
                           </tr>
                           <tr>
                              <td>Trạng thái</td>
                              <td><?= $topic->status; ?></td>
                           </tr>


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