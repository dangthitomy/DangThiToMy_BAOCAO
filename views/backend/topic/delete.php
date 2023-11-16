<?php

use App\Models\Topic;
use App\Libraries\MyClass;

date_default_timezone_set("Asia/Ho_Chi_Minh");

$id = $_REQUEST['id'];
$topic =  Topic::find($id);
if($topic==null){
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
    header("location:index.php?option=topic");
}
//
$topic->status =0;
$topic->updated_at = date('Y-m-d H:i:s');
$topic->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$topic->save();

MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Xóa thành công']);
header("location:index.php?option=topic");

//xóa nhiều mẫu tin
if(isset($_POST['DELETE_ALL'])){
    $list=$_POST['checkId'];
    foreach($list as $id){
        $topic=Topic::find($id);
        $topic->status=0;
        $topic->save();
    }
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Xóa thành công']);
    header("location:index.php?option=topic");

}
