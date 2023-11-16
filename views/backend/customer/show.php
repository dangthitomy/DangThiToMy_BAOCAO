<?php
use App\Models\user;
use App\Models\Customer;

$id = $_REQUEST['id'];
$customer =  user::find($id);
if($customer==null){
    header("location:index.php?option=customer");
}

$list = user::where('status','=',0)->orderBy('Created_at','DESC')->get();

?>

<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->


      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết khách hàng</h1>
                     <a href="index.php?option=customer&cat=create" class="btn btn-sm btn-primary">Thêm khách hàng</a>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header">
               <div class="row">
                  Nội dung
                  <div class="col-md-11 text-right">
                  <a href="index.php?option=customer" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về trang khách hàng
                  </a>
                  </div>
               </div>
               <div class="card-body">
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
                               <td><?= $customer->id;?></td>
                           </tr>
                           <tr>
                              <td>Tên khách hàng</td>
                               <td><?= $customer->name;?></td>
                           </tr>
                           <tr>
                              <td>Email</td>
                               <td><?= $customer->email;?></td>
                           </tr>
                           <tr>
                              <td>Số điện thoại</td>
                               <td><?= $customer->phone;?></td>
                           </tr>
                           <tr>
                              <td>Tên đăng nhập</td>
                               <td><?= $customer->username;?></td>
                           </tr>
                           <tr>
                              <td>Mật khẩu</td>
                               <td><?= $customer->password;?></td>
                           </tr>
                           <tr>
                              <td>Địa chỉ</td>
                               <td><?= $customer->address;?></td>
                           </tr>
                           <tr>
                           <tr>
                                 <td>Hình</td>
                                 <td><img class="img-fluid" width="300px;" src="../public/images/user/<?=$customer->image;?>" alt="<?=$customer->image;?>"></td>
                              </tr>
                           <tr>
                              <td>Quyền truy cập</td>
                               <td><?= $customer->roles;?></td>
                           </tr>
                           <tr>
                              <td>Ngày tạo</td>
                               <td><?= $customer->created_at;?></td>
                           </tr>
                           <tr>
                              <td>Người tạo</td>
                               <td><?= $customer->created_by;?></td>
                           </tr>
                           <tr>
                              <td>Ngày sửa</td>
                               <td><?= $customer->updated_at;?></td>
                           </tr>
                           <tr>
                              <td>Người sửa</td>
                               <td><?= $customer->updated_by;?></td>
                           </tr>
                           <tr>
                              <td>Trạng thái</td>
                               <td><?= $customer->status;?></td>
                           </tr>

                    
                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>

      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>