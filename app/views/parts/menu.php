<?php
    if (isset($_SESSION['user'])) {
        $role = $_SESSION['user']['role'];
        //
    } else {
        $menu = [
            [__('home', false), '/'],
            [__('about', false), '/'],
            [__('contact', false), '/'],
        ];
    }
    
?>
<li class="navbar-item"><a href="">Добавить товар</a></li>
<li class="navbar-item"><a href="">Склад</a></li>
<li class="navbar-item"><a href="">Статистика</a></li>