<?php
    if (isset($_SESSION['user'])) {
        $role = $_SESSION['user']['role'];
        if ($role === 'apteka') {
            $menus = [
                ['Добавить товар', '/apteka/add/'],
                ['Склад', '/'],
                ['Статистика', '/'],
            ];
        } else if ($role === 'kassa') {
            $menus = [
                ['Бош сахифа', '/'],
            ];
        }
    } else {
        $menus = [
            [__('home', false), '/'],
            [__('about', false), '/'],
            [__('contact', false), '/'],
        ];
    }
    
?>
<?php foreach ($menus as $menu): ?>
    <li class="navbar-item"><a href="<?php echo $menu[1] ?>"><?php echo $menu[0] ?></a></li>
<?php endforeach; ?>