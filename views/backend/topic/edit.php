<?php

use App\Libraries\MyClass;
use App\Models\Topic;

$id = $_REQUEST['id'];
$list = Topic::where([['status', '!=', 0], ['id', '!=', $id]])->get();
$topic =  Topic::find($id);
if ($topic == null) {
   MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
   header("location:index.php?option=topic");
}
$html_parent_id = "";
foreach ($list as $item) {
   if ($topic->parentid == $item->Id) {
      $html_parent_id .= "<option selected value ='" . $item->id . "'>" . $item['name'] . "</option>";
   } else {
      $html_parent_id .= "<option value ='" . $item->id . "'>" . $item['name'] . "</option>";
   }
}

?>

<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=topic&cat=process" method="post" enctype="multipart/form-data">

   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Cập nhật chủ đề</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header ">
               <div class="row">
                  <div class="col-md-6">
                     <a href="index.php?option=topic" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về danh sách Chủ đề
                     </a>
                  </div>
                  <div class="col-md-6 text-right">
                     <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Lưu[Cập nhật]
                     </button>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-8">
                     <div class="mb-3">
                        <input type="hidden" name="id" value="<?= $topic->id; ?>" />
                        <label>Tên chủ đề (*)</label>
                        <input type="text" value="<?= $topic['name']; ?>" name="name" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>slug</label>
                        <input type="text" value="<?= $topic['slug']; ?>" name="slug" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Từ khóa</label>
                        <textarea name="metakey" value="<?= $topic["metakey"]; ?>" class="form-control"></textarea>
                     </div>
                     <div class="mb-3">
                        <label>Mô tả</label>
                        <textarea name="metadesc" value="<?= $topic["metadesc"]; ?>" class="form-control"></textarea>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="mb-3">
                        <label>Cấp cha</label>
                        <select name="parent_id" class="form-control">
                           <option value="0">None</option>
                           <?= $html_parent_id; ?>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label>Sắp xếp</label>
                        <select name="sort_order" class="form-control">
                           <option value="1">1</option>

                        </select>
                     </div>
                     <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1" <?= ($topic->status == 1) ? 'selected' : ''; ?>>Xuất bản</option>
                           <option value="2" <?= ($topic->status == 2) ? 'selected' : ''; ?>>Chưa xuất bản</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>

         </div>
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>