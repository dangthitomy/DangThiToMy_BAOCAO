<?php

use App\Models\Post;
use App\Models\Topic;
use App\Libraries\MyClass;

$id = $_REQUEST["id"];
$page =  Post::where([['status', '!=', 0], ['id', '=', $id]])->first();
$list = Topic::where('status', '!=', 0)->get();
if ($page == null) {
   MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'mẫu tin không tồn tại']);
   header("location:index.php?option=page");
}
$page_topic_id = "";
foreach ($list as $item) {
   if ($page['topic_id'] == $item->id) {
      $page_topic_id .= "<option selected value ='" . $item['id'] . "'>" . $item['name'] . "</option>";
   } else {
      $page_topic_id .= "<option value ='" . $item['id'] . "'>" . $item['name'] . "</option>";
   }
}

?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=page&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline text-danger">Cập nhập Trang đơn</h1>
               </div>
            </div>
         </div>
      </section>
      <section class="content">
         <div class="card">
            <div class="card-header text-right">
               <a href="index.php?option=page" class="btn btn-sm btn-info">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  Về danh sách
               </a>
               <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                  <i class="fa fa-save" aria-hidden="true"></i>
                  Lưu [Cập nhật]
               </button>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-8">
                     <div class="mb-3">
                        <input type="hidden" name="id" value="<?= $page->id; ?>" />
                        <label>Tiêu đề bài viết (*)</label>
                        <input type="text" value="<?= $page->title; ?>" name="title" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" value="<?= $page->slug; ?>" name="slug" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Mô tả</label>
                        <textarea name="description" class="form-control"><?= $page->description; ?></textarea>
                     </div>
                     <div class="mb-3">
                        <label>Chi tiết (*)</label>
                        <textarea name="detail" rows="5" class="form-control"><?= $page->detail; ?></textarea>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="mb-3">
                        <label>Chủ đề (*)</label>
                        <select name="topic_id" class="form-control">
                           <option value="">None</option>
                           <?= $page_topic_id; ?>
                        </select>
                     </div>                   
                     <div class="mb-3">
                        <label>Hình ảnh</label>
                        <input type="file" name="image" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1" <?= ($page->status == 1) ? 'selected' : ''; ?>>Xuất bản</option>
                           <option value="2" <?= ($page->status == 2) ? 'selected' : ''; ?>>Chưa xuất bản</option>
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