<?php

use App\Models\Post;

$id = $_REQUEST['id'];
$page = Post::find($id);
if ($page == null) {
    header("location:index.php?option=page");
}
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline">Chi tiết trang đơn</h1>
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
                            <th>Tên trường</th>
                            <th>Giá trị</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td><?= $page->id; ?></td>
                        </tr>
                        <tr>
                            <td>topic_id</td>
                            <td><?= $page->topic_id; ?></td>
                        </tr>
                        <tr>
                            <td>title</td>
                            <td><?= $page->title; ?></td>
                        </tr>
                        <tr>
                            <td>slug</td>
                            <td><?= $page->slug; ?></td>
                        </tr>
                        <tr>
                            <td>detail</td>
                            <td><?= $page->detail; ?></td>
                        </tr>
                        <tr>
                            <td>image</td>
                            <td><img class="img-fluid" src="../public/images/post/<?= $page->image; ?>" alt="<?= $page->image; ?>" style="width:70px; height:100px;"></td>
                        </tr>
                        <tr>
                        <tr>
                            <td>type</td>
                            <td><?= $page->type; ?></td>
                        </tr>
                        <tr>
                            <td>description</td>
                            <td><?= $page->description; ?></td>
                        </tr>
                        <tr>
                            <td>created_at</td>
                            <td><?= $page->created_at; ?></td>
                        </tr>
                        <tr>
                            <td>created_by</td>
                            <td><?= $page->created_by; ?></td>
                        </tr>
                        <tr>
                            <td>updated_at</td>
                            <td><?= $page->updated_at; ?></td>
                        </tr>
                        <tr>
                            <td>updated_by</td>
                            <td><?= $page->updated_by; ?></td>
                        </tr>
                        <tr>
                            <td>status</td>
                            <td><?= $page->status; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
        </div>
    </section>
</div>

<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>