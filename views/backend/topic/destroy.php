<?php
use App\Libraries\MyClass;
use App\Models\Topic;
$id = $_REQUEST['id'];
$topic = Topic::find($id);
if($topic==null){
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
    header("location:index.php?option=topic&cat=trash");
}
$topic->delete();// xóa vv
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'xóa thành công']);
header("location:index.php?option=topic&cat=trash");