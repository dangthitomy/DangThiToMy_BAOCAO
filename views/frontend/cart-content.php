<?php

use App\Libraries\Cart;

$listcart = Cart::cartContent();
?>

<?php
require_once 'views/frontend/header.php';
?>
<section class="bg-light">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb py-2 my-0">
                <li class="breadcrumb-item">
                    <a class="text-main" href="index.html">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Giỏ hàng của bạn
                </li>
            </ol>
        </nav>
    </div>
</section>
<section class="hdl-maincontent py-2">
    <div class="container">
        <form action="index.php?option=cart&updatecart=true" method="post">
            <table class="table table-bordered">
                <thead>
                    <tr class="bg-dark">
                        <th style="width:30px;" class="text-center">STT</th>
                        <th style="width:100px;">Hình</th>
                        <th>Tên sản phẩm</th>
                        <th class="text-center">Giá</th>
                        <th style="width:130px" class='text-center'>Số lượng</th>
                        <th class="text-center">Thành tiền</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($listcart) > 0) : ?>
                        <?php
                        $stt = 1;
                        ?>
                        <?php foreach ($listcart as $cart) : ?>
                            <?php $money_item = $cart['qty'] * $cart['price']; ?>
                            <tr>
                                <td class="text-center align-middle"><?= $stt; ?></td>
                                <td>
                                    <img class="img-fluid" src="public/images/product/<?= $cart['image']; ?>" alt="<?= $cart['image']; ?>">
                                </td>
                                <td class="align-middle"><?= $cart['name']; ?></td>
                                <td class="text-center align-middle"><?= number_format($cart['price']); ?></td>
                                <td class="text-center align-middle">
                                    <div class="input-group mb-3">
                                        <input type="number" value="<?= $cart['qty']; ?>" id="qty" min="0" name="qty[<?= $cart['id']; ?>]"
                                        style="width:60px;">
                                    </div>
                                </td>
                                <td class="text-center align-middle">
                                    <?= number_format($money_item); ?>
                                </td>
                                <td class="text-center align-middle">
                                    <a href ="index.php?option=cart&deletecart=<?= $cart['id']; ?>" class="btn btn-sm btn-main">
                                        <i class="fa-solid fa-xmark"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $stt++; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7" class="text-center">Chưa có sản phẩm trong giỏ hàng</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">
                            <button class="btn btn-main" type="submit">Cập nhật</button>
                            <a href="index.php?option=checkout" class="btn btn-main">Thanh toán</a>
                        </td>
                        <td colspan="2" class="text-end">
                            <strong>Tổng tiền: <?= number_format(Cart::cartTotal()); ?> VND</strong>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
    <script>
        function changenumber(id) {
            var qty = parseInt(document.getElementById("qty").value);
            if (id == 'sub') {
                if (qty > 0) {
                    qty = qty - 1;
                }
            } else {
                qty = qty + 1;
            }
            document.getElementById("qty").value = qty.toString();
        }
    </script>
</section>
<?php require_once 'views/frontend/footer.php'; ?>