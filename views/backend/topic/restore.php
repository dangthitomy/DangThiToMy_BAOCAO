<?php
use App\Libraries\MyClass;
use App\Models\Topic;

$id = $_REQUEST['id'];
$topic =  Topic::find($id);
if($topic==null){
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);

    header("location:index.php?option=topic&cat=trash");
}
//
$topic->status =2;
$topic->updated_at = date('Y-m-d H:i:s');
$topic->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$topic->save();
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'khôi phục thành công']);
header("location:index.php?option=topic&cat=trash");