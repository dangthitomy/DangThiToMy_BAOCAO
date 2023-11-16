<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <form action ="index.php?option=banner&cat=process" method="post" enctype="multipart/form-data">
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Thêm mới banner</h1>
                  </div>
               </div>
            </div>
         </section>
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
                  <a href="index.php?option=banner" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
                  <button type="submit" class="btn btn-sm btn-success" type ="submit"name="THEM">
                     <i class="fa fa-save" aria-hidden="true"></i>
                     Thêm banner
                  </button>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-9">
                        <div class="mb-3">
                           <label>Tên banner (*)</label>
                           <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Liên kết</label>
                           <input type="text" name="link" class="form-control">
                        </div>
                   
                     </div>
                     <div class="col-md-3">
                        <div class="mb-3">
                           <label>Vị trí (*)</label>
                           <select name="position" class="form-control">
                              <option value="">None</option>
                              <option value="1">Tên danh mục</option>
                           </select>
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