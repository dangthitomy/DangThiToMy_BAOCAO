<?php

use App\Models\Menu;

$dk = [
    ['status', '!=', 0],
    ['status', '!=', 0]
];
$id = $_REQUEST['id'];
$brand = Menu::find($id);

?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline">Chi tiết menu</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="row">
                <div class="col-md-12 text-right">
                    <a href="index.php?option=brand" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về danh sách
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tên trường</th>
                                    <th>Giá trị</th>
                                </tr>
                            </thead>
                            <tbody>


                                <tr>
                                    <td>ID</td>
                                    <td><?= $brand->id; ?></td>
                                </tr>
                                <tr>
                                    <td>NAME</td>
                                    <td><?= $brand->name; ?></td>
                                </tr>
                                <tr>
                                    <td>SLUG</td>
                                    <td><?= $brand->slug; ?></td>
                                </tr>
                                <tr>
                                    <td>IMAGE</td>
                                    <td style="width:5rem; height:5rem;">
                                        <img src="../public/images/product/<?= $brand->image; ?>"
                                            alt="<?= $brand->image; ?>"
                                            style="width:100%; height:100%; object-fit: cover;">
                                    </td>

                                </tr>
                                <tr>
                                    <td>SORT_ORDER</td>
                                    <td><?= $brand->sort_order; ?></td>
                                </tr>
                                <tr>
                                    <td>DESCRIPTION</td>
                                    <td><?= $brand->description; ?></td>
                                </tr>
                                <tr>
                                    <td>CREATED_BY</td>
                                    <td><?= $brand->created_by; ?></td>
                                </tr>
                                <tr>
                                    <td>UPDATED_AT</td>
                                    <td><?= $brand->updated_at; ?></td>
                                </tr>
                                <tr>
                                    <td>UPDATED_BY</td>
                                    <td><?= $brand->updated_by; ?></td>
                                </tr>
                                <tr>
                                    <td>STATUS</td>
                                    <td><?= $brand->status; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- END CONTENT-->
<?php require_once '../views/backend/footer.php' ?>