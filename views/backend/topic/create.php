<?php

use App\Models\Topic;

$list = Topic::where('status', '!=', 0)->orderBy('created_at', 'DESC')->get();

$html_parent_id = "";

foreach ($list as $item) {
    $html_parent_id .= "<option value='" . $item['id'] . "'>" . $item["name"] . "</option>";
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
                        <h1 class="d-inline">Thêm chủ đề</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-header">
                            <a href="index.php?option=topic" class="btn btn-sm btn-info">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Về danh sách
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-header text-right">
                            <button class="btn btn-sm btn-success" type="submit" name="THEM">
                                <i class="fa fa-save" aria-hidden="true"></i>
                                Thêm [Lưu]
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label>Tên chủ đề (*)</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>slug</label>
                                <input type="text" name="slug" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Từ khóa</label>
                                <textarea name="metakey" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Mô tả</label>
                                <textarea name="metadesc" class="form-control"></textarea>
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
                                    <option value="1">Xuất bản</option>
                                    <option value="2">Chưa xuất bản</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="card-header text-right">
                            <button class="btn btn-sm btn-success" type="submit" name="THEM">
                                <i class="fa fa-save" aria-hidden="true"></i>
                                Thêm [Lưu]
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</form>
<?php require_once "../views/backend/footer.php"; ?>