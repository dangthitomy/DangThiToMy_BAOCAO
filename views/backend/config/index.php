<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Cấu hình</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header p-2">
                  Noi dung
               </div>
               <div class="card-body">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th>Tên cấu hình</th>
                           <th>Giá trị</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>#</td>
                           <td>
                              <input type="text" name="name" class="form-control" placeholder="Nhập tên cấu hình">
                           </td>
                           <td>
                              <input type="text" name="value" class="form-control" placeholder="Nhập giá trị">
                           </td>
                           <td class="text-center">
                              <button class="btn btn-sm btn-success">Thêm</button>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <input type="checkbox">
                           </td>
                           <td>
                              Ten
                           </td>
                           <td>
                              Gia tri
                           </td>
                           <td class="text-center">
                              <a href="#" class="btn btn-sm btn-danger">
                                 <i class="fa fa-trash" aria-hidden="true"></i>
                              </a>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>