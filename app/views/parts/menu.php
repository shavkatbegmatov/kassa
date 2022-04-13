<?php

    $menus = [];

    if (isset($_SESSION['user'])) {
        $role = $_SESSION['user']['role'];
        if ($role === 'pharmacist') {
            $menus = [
                ['Маҳсулот сотиш', SUB.'/pharmacist/sell/'],
                ['Янги товар номини қўшиш', SUB.'/pharmacist/add/'],
                ['Маҳсулот қабул қилиш', SUB.'/pharmacist/purchase/'],
                ['Статистика', SUB.'/'],
            ];
        } else if ($role === 'kassa') {
            $menus = [
                ['Бош саҳифа', SUB.'/'],
            ];
        } else if ($role === 'admin') {
            if (isset($this->route['prefix'])) {
                $menus = [
                    [__('users', false), SUB.'/admin/users/'],
                    [__('patients', false), SUB.'/admin/patient/'],
                    [__('blog', false), SUB.'/admin/blog/create'],
                    [__('catalog', false), SUB.'/admin/catalog/create'],
                ];
            } else {
                $menus = [
                    ['Бош саҳифа', SUB.'/'],
                    ['Бош саҳифа', SUB.'/'],
                    ['Бош саҳифа', SUB.'/'],
                ];
            }

            
        } else if ($role === 'recorder') {
            $menus = [
                ['Беморни киритиш', SUB.'/'],
                ['Бош саҳифа', SUB.'/'],
                ['Бош саҳифа', SUB.'/'],
            ];
        } else if ($role === 'manager') {
            $menus = [
                ['Нархлар', SUB.'/manager/price'],
            ];
        }
    } else {
        $menus = [
            [__('home', false), SUB.'/'],
            [__('about', false), SUB.'/'],
            [__('contact', false), SUB.'/'],
        ];
    }
    
?>
<?php foreach ($menus as $menu): ?>
    <li class="navbar-item"><a href="<?php echo $menu[1] ?>"><?php echo $menu[0] ?></a></li>
<?php endforeach; ?>