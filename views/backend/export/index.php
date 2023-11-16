<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Xuất hàng</h1>
                  </div>
               </div>
            </div>
         </section>
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
                  <a href="../backend/product_index.html" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
                  <button class="btn btn-sm btn-success" name="CHANGEADD">
                     <i class="fa fa-save" aria-hidden="true"></i>
                     Lưu
                  </button>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-6">
                        <h4 class="fs-6">Thông tin khách hàng</h4>
                        <hr/>
                        <div class="mb-3">
                           <label>Họ tên (*)</label>
                           <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Email (*)</label>
                           <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Điện thoại (*)</label>
                           <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Địa chỉ (*)</label>
                           <input type="text" name="name" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <h4 class="fs-6">Thông tin sản phẩm</h4>
                        <hr/>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="mb-3">
                                 <label>Danh mục (*)</label>
                                 <select name="category_id" class="form-control">
                                    <option value="">None</option>
                                    <option value="1">Tên danh mục</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="mb-3">
                                 <label>Thương hiệu (*)</label>
                                 <select name="brand_id" class="form-control">
                                    <option value="">None</option>
                                    <option value="1">Tên thương hiệu</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="mb-3">
                           <label>Tên sản phẩm (*)</label>
                           <input type="text" name="name" class="form-control">
                        </div>
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th class="text-center" style="width:30px;">
                                    <input type="checkbox">
                                 </th>
                                 <th class="text-center" style="width:130px;">Hình ảnh</th>
                                 <th>Tên sản phẩm</th>
                                 <th>Tên danh mục</th>
                                 <th>Tên thương hiệu</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr class="datarow">
                                 <td>
                                    <input type="checkbox">
                                 </td>
                                 <td>
                                    <img src="../public/images/product.jpg" alt="product.jpg">
                                 </td>
                                 <td>
                                    <div class="name">
                                       Tên sản phẩm
                                    </div>
                                    <div class="function_style">
                                       <a href="#">Hiện</a> |
                                       <a href="#">Chỉnh sửa</a> |
                                       <a href="../backend/product_show.html">Chi tiết</a> |
                                       <a href="#">Xoá</a>
                                    </div>
                                 </td>
                                 <td>Tên danh mục</td>
                                 <td>Tên Thuong hiệu</td>
                              </tr>
                           </tbody>
                        </table>
                        <div class="mb-3">
                           <label>Mã sản phẩm</label>
                           <input type="text" readonly value="1" name="id" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Giá nhập</label>
                           <input type="number" value="10000" min="10000" name="price" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Số lượng</label>
                           <input type="number" value="10000" min="10000" name="qty" class="form-control">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>