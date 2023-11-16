<?php

use App\Models\Menu;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;
use App\Models\Post;

$list = Menu::where('status', '!=', 0)->orderBy('created_at', 'DESC')->get();
$list_category = Category::where('status', '!=', 0)->get();
$list_brand = Brand::where('status', '!=', 0)->get();
$list_topic = Topic::where('status', '!=', 0)->get();
$list_page = Post::where([['status', '!=', 0], ['type', '!=', 'page']])->get();
?>
<?php require_once '../views/backend/header.php'; ?>
<form action="index.php?option=menu&cat=process" method="post">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <strong class="text-dark text-lg">DANH SÁCH MENU</strong>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tất cả menu</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <!-- Main content -->
        <section class="content">


            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-sm btn-danger">
                                <a class="btn-danger" href="index.php?option=menu&cat=trash"><i class="fas fa-trash"></i></a>
                            </button>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="index.php?option=menu&cat=create" class="btn btn-sm btn-success">
                                <i class="fas fa-plus"></i>Thêm
                            </a>
                            <a href="index.php?option=menu&cat=trash" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>Thùng rác
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="accordion" id="accordionExample">
                                <div class="card mb-0 p-3">
                                    <select name="position" class="form-control">
                                        <option value="mainmenu">Main Menu</option>
                                        <option value="footermenu">Footer Menu</option>
                                    </select>
                                </div>
                                <div class="card mb-0">
                                    <div class="card-header" id="headingCategory">
                                        <strong data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseCategory">
                                            Danh mục sản phẩm
                                        </strong>
                                    </div>
                                    <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory" data-parent="#accordionExample">
                                        <div class="card-body p-3">
                                            <?php foreach ($list_category as $category) : ?>
                                                <div class="form-check">
                                                    <input name="categoryId[]" class="form-check-input" type="checkbox" value="<?= $category->id ?>" id="categorycheck <?= $category->id ?>">
                                                    <label class="form-check-label" for="categorycheck <?= $category->id ?>">
                                                        <?= $category->name ?>
                                                    </label>
                                                </div>
                                            <?php endforeach; ?>
                                            <div class="my-3">
                                                <button name="THEMCATEGORY" class="btn btn-sm btn-success form-control">Thêm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-0">
                                    <div class="card-header" id="headingBrand">
                                        <strong data-toggle="collapse" data-target="#collapseBrand" aria-expanded="true" aria-controls="collapseBrand">
                                            Thương hiệu
                                        </strong>
                                    </div>
                                    <div id="collapseBrand" class="collapse" aria-labelledby="headingBrand" data-parent="#accordionExample">
                                        <div class="card-body p-3">
                                            <?php foreach ($list_brand as $brand) : ?>
                                                <div class="form-check">
                                                    <input name="brandId[]" class="form-check-input" type="checkbox" value="<?= $brand->id ?>" id="brandcheck <?= $brand->id ?>">
                                                    <label class="form-check-label" for="brandcheck <?= $brand->id ?>">
                                                        <?= $brand->name ?>
                                                    </label>
                                                </div>
                                            <?php endforeach; ?>
                                            <div class="my-3">
                                                <button name="THEMBRAND" class="btn btn-sm btn-success form-control">Thêm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-0">
                                    <div class="card-header" id="headingTopic">
                                        <strong data-toggle="collapse" data-target="#collapseTopic" aria-expanded="true" aria-controls="collapseTopic">
                                            Chủ đề bài viết
                                        </strong>
                                    </div>
                                    <div id="collapseTopic" class="collapse" aria-labelledby="headingTopic" data-parent="#accordionExample">
                                        <div class="card-body p-3">
                                            <?php foreach ($list_topic as $topic) : ?>
                                                <div class="form-check">
                                                    <input name="topicId[]" class="form-check-input" type="checkbox" value="<?= $topic->id ?>" id="topiccheck <?= $topic->id ?>">
                                                    <label class="form-check-label" for="topiccheck <?= $topic->id ?>">
                                                        <?= $topic->name ?>
                                                    </label>
                                                </div>
                                            <?php endforeach; ?>
                                            <div class="my-3">
                                                <button name="THEMTOPIC" class="btn btn-sm btn-success form-control">Thêm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-0">
                                    <div class="card-header" id="headingPage">
                                        <strong data-toggle="collapse" data-target="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
                                            Trang đơn
                                        </strong>
                                    </div>
                                    <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionExample">
                                        <div class="card-body p-3">
                                            <?php foreach ($list_page as $page) : ?>
                                                <div class="form-check">
                                                    <input name="postId[]" class="form-check-input" type="checkbox" value="<?= $page->id ?>" id="pagecheck <?= $page->id ?>">
                                                    <label class="form-check-label" for="pagecheck <?= $page->id ?>">
                                                        <?= $page->title ?>
                                                    </label>
                                                </div>
                                            <?php endforeach; ?>
                                            <div class="my-3">
                                                <button name="THEMPAGE" class="btn btn-sm btn-success form-control">Thêm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-0">
                                    <div class="card-header" id="headingCustom">
                                        <strong data-toggle="collapse" data-target="#collapseCustom" aria-expanded="true" aria-controls="collapseCustom">
                                            Tuỳ liên kết
                                        </strong>
                                    </div>
                                    <div id="collapseCustom" class="collapse" aria-labelledby="headingCustom" data-parent="#accordionExample">
                                        <div class="card-body p-3">
                                            <div class="mb-3">
                                                <label>Tên menu</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label>Liên kết</label>
                                                <input type="text" name="link" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <button name="THEMCUSTOM" class="btn btn-sm btn-success form-control">Thêm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 30px;">
                                            <input type="checkbox" name="checkAll" />
                                        </th>
                                        <th class="text-center" style="width: 100px;">Tên menu</th>
                                        <th>link</th>
                                        <th>ngày tạo</th>
                                        <th class="text-center" style="width: 200px;">Chức năng</th>
                                        <th class="text-center" style="width: 30px;">ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($list as $row) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <input type="checkbox" name="checkID[]" value=" $row->id;?>" />
                                            </td>
                                            <td class="text-center">
                                                <?= $row->name; ?>
                                            </td>
                                            <td>
                                                <?= $row->link; ?>
                                            </td>
                                            <td>
                                                <?= $row->created_at; ?>
                                            </td>

                                            <td class="text-center">
                                                <?php if ($row->status == 1) : ?>
                                                    <a href="index.php?option=menu&cat=status&id=<?= $row->id; ?>" class="btn btn-sm btn-success">
                                                        <i class="fas fa-toggle-on"></i>
                                                    </a>
                                                <?php else : ?>
                                                    <a href="index.php?option=menu&cat=status&id=<?= $row->id; ?>" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-toggle-off"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <a href="index.php?option=menu&cat=show&id=<?= $row->id; ?>" class="btn btn-sm btn-info">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                <a href="index.php?option=menu&cat=edit&id=<?= $row->id; ?>" class="btn btn-sm btn-primary">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a href="index.php?option=menu&cat=delete&id=<?= $row->id; ?>" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>

                                            </td>
                                            <td class="text-center"><?= $row->id; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
</form>
<?php require_once '../views/backend/footer.php'; ?>