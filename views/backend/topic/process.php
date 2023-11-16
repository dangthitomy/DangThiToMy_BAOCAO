<?php

use App\Models\Topic;
use App\Libraries\MyClass;
// cài đặt múi giờ
date_default_timezone_set("Asia/Ho_Chi_Minh");
// xử lý thêm
if (isset($_POST['THEM'])) {
    $topic = new Topic();
    //lấy từ form
    $topic->name = $_POST['name'];
    $topic->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['name']);
    $topic->status = $_POST['status'];
    $topic->metakey = $_POST['metakey'];
    $topic->metadesc = $_POST['metadesc'];
    $topic->parent_id = $_POST['parent_id'];
    $topic->sort_order = 1;
    //tự sinh ra
    $topic->created_at = date('Y-m-d H:i:s');
    $topic->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;

    var_dump($topic);
    //lưu vào csdl
    $topic->save();
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    //chuyên hướng về trang topic
    header("location:index.php?option=topic");
}
// xử lý cập nhật/ chỉnh sửa
if (isset($_POST['CAPNHAT'])) {

    $id = $_POST['id'];
    $topic = Topic::find($id);
    //lấy từ form
    $topic->name = $_POST['name'];
    $topic->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['name']);
    $topic->status = $_POST['status'];
    $topic->metakey = $_POST['metakey'];
    $topic->metadesc = $_POST['metadesc'];
    $topic->parent_id = $_POST['parent_id'];
    $topic->parent_id = 1;

    //tự sinh ra
    $topic->updated_at = date('Y-m-d H:i:s');
    $topic->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($topic);
    //lưu vào csdl
    $topic->save();
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
    //chuyên hướng về index
    header("location:index.php?option=topic");
}
