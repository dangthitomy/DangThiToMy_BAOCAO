<?php require_once "../views/backend/header.php";?>

      <!-- CONTENT -->
      <form action ="index.php?option=user&cat=process" method="post" enctype="multipart/form-data">

      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Thêm mới thành viên</h1>
                  </div>
               </div>
            </div>
         </section>
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
                  <a href="index.php?option=user" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
                  <button class="btn btn-sm btn-success" type="submit" name="THEM">
                     <i class="fa fa-save" aria-hidden="true"></i>
                     Thêm thành viên
                  </button>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-6">
                
                        <div class="mb-3">
                           <label>Họ tên (*)</label>
                           <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Điện thoại</label>
                           <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Email</label>
                           <input type="text" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Tên đăng nhập</label>
                           <input type="text" name="username" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Mật khẩu</label>
                           <input type="password" name="password" class="form-control">
                        </div>
                     
                        <div class="mb-3">
                           <label>Địa Chỉ</label>
                           <input type="address" name="address" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6">
                     <div class="mb-3">
                           <label>Hình đại diện</label>
                           <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Vai Trò</label>
<input type="roles" name="roles" class="form-control">
                        </div>
                       
                        <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1">Xuất bản</option>
                              <option value="2">Chưa xuất bản</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      </form>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>