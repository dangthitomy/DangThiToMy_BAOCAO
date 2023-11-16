<?php

use App\Models\Menu;

$mod_footermenu = Menu::where([['position', '=', 'footermenu'], ['status', '=', 1]])
    ->orderBy('sort_order', 'ASC')
    ->get();
?>
<h3 class="widgettilte">
    <strong>Liên hệ</strong>
</h3>
<ul class="footer-menu">
    <?php foreach ($mod_footermenu as $rowmenu) : ?>
        <li><a href="<?= $rowmenu->link; ?>"><?= $rowmenu->name; ?></a></li>
    <?php endforeach; ?>
</ul>


<h3 class="widgettilte mt-3">GOOGLE MAP</h3>
<div class="map my-3">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.7258019075434!2d106.7819034749337!3d10.83228328931998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175271c92fe691f%3A0x8dcb6c32493554f2!2zMjM1ZiDEkMOsbmggUGhvbmcgUGjDuiwgVMSDbmcgTmjGoW4gUGjDuiBCLCBRdeG6rW4gOSwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1700010769807!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>