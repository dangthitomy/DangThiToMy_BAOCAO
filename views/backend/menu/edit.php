<?php

use App\Models\Menu;

// Kiểm tra xem 'id' được truyền vào từ yêu cầu
// Kiểm tra xem 'id' đã được truyền vào từ yêu cầu
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    // Lấy thương hiệu từ cơ sở dữ liệu bằng ID
    $menu = Menu::find($id);

    if ($menu) {
        $error = ""; // Thiết lập biến lỗi ban đầu

        // Kiểm tra nếu nút "Cập nhật" được bấm
        if (isset($_POST['CAPNHAT'])) {
            // Lấy các giá trị từ biểu mẫu
            $name = $_POST['name'];
            $link = $_POST['link'];

            // Cập nhật các trường dữ liệu của thương hiệu
            $menu->name = $name;
            $menu->link = $link;
            $menu->status = 1;

            // Lưu các thay đổi vào cơ sở dữ liệu
            $menu->save();
            $error = 'Cập nhật thành công !!!';
            header("location:index.php?option=menu");
        } else {
            $error = "thất bại !!!";
        }
    }
}
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline">Cập nhật MENU</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header text-right">
                <form action="index.php?option=menu&cat=edit&id=<?= $menu->id ?>" method="post">
                    <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Lưu
                    </button>

                    <a href="index.php?option=menu" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về danh sách
                    </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label><?= $error ?></label>
                        </div>
                        <div class="mb-3">
                            <label>Tên menu (*)</label>
                            <input type="text" value="<?= $menu->name; ?>" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>liên kết</label>
                            <input type="text" value="<?= $menu->link; ?>" name="link" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Trạng thái</label>
                            <select name="status" class="form-control">
                                <option value="1" <?= ($menu->status == 1) ? 'selected' : ''; ?>>Xuất bản</option>
                                <option value="2" <?= ($menu->status == 2) ? 'selected' : ''; ?>>Chưa xuất bản</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>
</div>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>