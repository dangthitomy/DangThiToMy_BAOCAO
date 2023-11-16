<?php

use App\Models\Post;
use App\Libraries\MyClass;
use App\Libraries\Upload;

date_default_timezone_set("Asia/Ho_Chi_Minh");

if (isset($_POST['THEM'])) {
    $page = new Post();
    //lấy từ form
    $page->title = $_POST['title'];
    $page->detail = $_POST['detail'];
    $page->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['title']);
    $page->description = $_POST['description'];
    $page->topic_id = $_POST['topic_id'];
    $page->status = $_POST['status'];
    $page->type = 'page';
    //tư sinh ra
    $page->created_at = date('Y-m-d H:i:s');
    $page->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($page);
    // Xử lí uploadfile
    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/post/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = date('YmdHis') . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $page->image = $filename;
        }
    }

    //luu vao csdl
    $page->save();
    //về trang page
    header("location:index.php?option=page");
}
if (isset($_POST['CAPNHAT'])) {
    $id = $_POST['id'];
    $page = Post::find($id);
    if ($page == null) {
        header("location:index.php?option=page");
    }
    //lấy từ form
    $page->title = $_POST['title'];
    $page->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['title']);
    $page->description = $_POST['description'];
    $page->topic_id = $_POST['topic_id'];
    $page->detail = $_POST['detail'];
    $page->type = 'page';
    $page->status = $_POST['status'];
    //tư sinh ra
    $page->updated_at = date('Y-m-d H:i:s');
    $page->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    //Xử lí uploadfile
    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/post/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = date('YmdHis') . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $page->image = $filename;
        }
    }

    var_dump($page);
    //luu vao csdl
    $page->save();
    // quay lại trang đơn
    header("location:index.php?option=page");
}
