<?php

use App\Models\User;
use App\Libraries\MyClass;

if(isset($_POST['THEM'])) {
    $user= new User();
    //lay tu form
  
    $user->name = $_POST['name'];
    // $user->gender = $_POST['gender'];
    $user->phone = $_POST['phone'];
    $user->email = $_POST['email'];
    $user->username = $_POST['username'];
    $user->password = sha1($_POST['password']);
    // $user->address = $_POST['address'];
    $user->roles = 1;
    $user->status = $_POST['status'];



if(strlen($_FILES['image']['name'])>0)
{
    $target_dir ="../public/images/user/";
    $target_file =$target_dir . basename($_FILES["image"]["name"]);
    $extension=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(in_array($extension,['jpg','jpeg','png','gif','webp'])){
        $filename=date('YmdHis')  .'.' . $extension; //$user->phone
        move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
        $user->image=$filename;
    }
}

    $user->created_at= date('Y-m-d h:i:s');
    $user->created_by= (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;

    var_dump($user);
    $user->save();

    MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'success']);
    header("location:index.php?option=user");
}

///////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['CAPNHAT'])){
    $id=$_POST ['id'];
    $user= User::find($id);
    if($user==null){
        MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
        header("location:index.php?option=user");
    }
    //lấy từ form

    $user->name = $_POST['name'];
    //$user->gender = $_POST['gender'];
    $user->phone = $_POST['phone'];
    $user->email = $_POST['email'];
    $user->username = $_POST['username'];
    $user->password = sha1($_POST['password']);
    //$user->address = $_POST['address'];
    $user->roles = $_POST['roles'];
    $user->status = $_POST['status'];

//xử lý upload file
if(strlen($_FILES['image']['name'])>0)
{
    //xóa hình cũ


    //thêm hình mới
    $target_dir ="../public/images/user/";
    $target_file =$target_dir . basename($_FILES["image"]["name"]);
    $extension=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(in_array($extension,['jpg','jpeg','png','gif','webp'])){
        $filename= date('YmdHis') .'.' . $extension;
        move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
        $user->image=$filename;
    }
}
//tự sinh ra
    $user->updated_at= date('Y-m-d H:i:s');
    $user->updated_by= (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    
    var_dump($user);
    //lưu vào csdl

    $user->save();
    //chuyên hướng về index
    MyClass::set_flash('message',['msg'=>'Cập nhật thành công','type'=>'success']);
    header("location:index.php?option=user");
} 