<?php
use App\Models\User;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$user =  User::find($id);
if($user==null){
   MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=user");
}
?>
<?php require_once '../views/backend/header.php';?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết thành viên</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header ">
                 <div class="row">
                  <div class="col-md-12 text-right">
                  <a href="index.php?option=user" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
                  </div>
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
                                 <td><?=$user->id;?></td>
                              </tr>
                              <tr>
                                 <td>NAME</td>
                                 <td><?=$user->name;?></td>
                              </tr>
                              <tr>
                                 <td>USERNAME</td>
                                 <td><?=$user->username;?></td>
                              </tr>
                              <tr>
                                 <td>IMAGE</td>
                                 <td><img style="width:100px;" src="../public/images/user<?=$user->image;?>" alt="<?=$user->image;?>"></td>
                              </tr>
                              <tr>
                                 <td>PASSWORD</td>
                                 <td><?=$user->password;?></td>
                              </tr>
                              <tr>
                                 <td>EMAIL</td>
                                 <td><?=$user->email;?></td>
                              </tr>
                              <tr>
                                 <td>GENDER</td>
                                 <td><?=$user->gender;?></td>
                              </tr>
                              <tr>
                                 <td>PHONE</td>
                                 <td><?=$user->phone;?></td>
                              </tr>
                              <tr>
                                 <td>ROLES</td>
                                 <td><?=$user->roles;?></td>
                              </tr>
                              <tr>
                                 <td>ADDRESS</td>
                                 <td><?=$user->address;?></td>
                              </tr>
                              <tr>
                                 <td>CREATED_AT</td>
                                 <td><?=$user->created_at;?></td>
                              </tr>
                              <tr>
                                 <td>CREATED_BY</td>
                                 <td><?=$user->created_by;?></td>
                              </tr>
                              <tr>
                                 <td>UPDATED_AT</td>
                                 <td><?=$user->updated_at;?></td>
                              </tr>
                              <tr>
                                 <td>UPDATED_BY</td>
                                 <td><?=$user->update_by;?></td>
                              </tr>
                              <tr>
                                 <td>STATUS</td>
                                 <td><?=$user->status;?></td>
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
<?php require_once '../views/backend/footer.php';?>