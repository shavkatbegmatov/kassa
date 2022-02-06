<?php
    if (isset($_SESSION['user'])) {
        $role = $_SESSION['user']['role'];
        if ($role === 'pharmacist') {
            $menus = [
                ['Маҳсулот сотиш', '/pharmacist/sell/'],
                ['Янги товар номини қўшиш', '/pharmacist/add/'],
                ['Маҳсулот қабул қилиш', '/pharmacist/purchase/'],
                ['Статистика', '/'],
            ];
        } else if ($role === 'kassa') {
            $menus = [
                ['Бош саҳифа', '/'],
            ];
        } else if ($role === 'admin') {
            if (isset($this->route['prefix'])) {
                $menus = [
                    [__('users', false), '/admin/users/'],
                    [__('patients', false), '/admin/patient/'],
                    [__('blog', false), '/admin/blog/create'],
                    [__('catalog', false), '/admin/catalog/create'],
                ];
            } else {
                $menus = [
                    ['Бош саҳифа', '/'],
                    ['Бош саҳифа', '/'],
                    ['Бош саҳифа', '/'],
                ];
            }

            
        } else if ($role === 'recorder') {
            $menus = [
                ['Беморни киритиш', '/'],
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