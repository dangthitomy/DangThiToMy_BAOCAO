<?php
use App\Models\User;
use App\Models\Customer;
use App\Libraries\MyClass;

if(isset($_POST['THEM']))
{
    $customer=new User();
    //lấy từ form
    $customer->name = $_POST['name'];
   // $customer->gender = $_POST['gender'];
    $customer->phone = $_POST['phone'];
    $customer->email = $_POST['email'];
    $customer->username = $_POST['username'];
    $customer->password = $_POST['password'];
    $customer->address = $_POST['address'];
    $customer->roles = 1;
    $customer->status = $_POST['status'];
    //Xử lí uploadfile
    if(strlen($_FILES['image']['name'])>0){
        $target_dir = "../public/images/user/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=date('YmdHis').'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $customer->image =$filename;
        }
    }
    //tư sinh ra
    $customer->created_at = date('Y-m-d-H:i:s');
    $customer->created_by = (isset($_SESSION['customer_id']))? $_SESSION['customer_id'] : 1;
    var_dump($customer);
    //luu vao csdl
    //ínet
    $customer->save();
    //
    header("location:index.php?option=customer");
}
//-----------------------------------
if(isset($_POST['CAPNHAT']))
{
    $id=$_POST ['id'];
    $customer= customer::find($id);
    if($customer==null){
        header("location:index.php?option=customer");
    }
    //lấy từ form
    $customer->name = $_POST['name'];
   // $customer->gender = $_POST['gender'];
    $customer->phone = $_POST['phone'];
    $customer->email = $_POST['email'];
    $customer->customername = $_POST['customername'];
    $customer->password = $_POST['password'];
    $customer->address = $_POST['address'];
    $customer->roles = $_POST['roles'];

    $customer->status = $_POST['status'];
    //Xử lí uploadfile
    if(strlen($_FILES['image']['name'])>0){
        //

        //
        $target_dir = "../public/images/customer/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=date('YmdHis').'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $customer->image =$filename;
        }
    }
    //tư sinh ra
    $customer->updated_at = date('Y-m-d-H:i:s');
    $customer->updated_by = (isset($_SESSION['customer_id']))? $_SESSION['customer_id'] : 1;
    var_dump($customer);
    //luu vao csdl
    //ínet
    $customer->save();
    //
    header("location:index.php?option=customer");
}

