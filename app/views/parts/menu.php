<?php
    if (isset($_SESSION['user'])) {
        $role = $_SESSION['user']['role'];
        if ($role === 'apteka') {
            $menus = [
                ['Маҳсулот сотиш', '/apteka/sell/'],
                ['Янги товар номини қўшиш', '/apteka/add/'],
                ['Маҳсулот қабул қилиш', '/apteka/purchase/'],
                ['Статистика', '/'],
            ];
        } else if ($role === 'kassa') {
            $menus = [
                ['Бош саҳифа', '/'],
            ];
        } else if ($role === 'admin') {
            $menus = [
                ['Бош саҳифа', '/'],
                ['Бош саҳифа', '/'],
                ['Бош саҳифа', '/'],
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