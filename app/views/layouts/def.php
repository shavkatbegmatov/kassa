<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php \framework\core\base\View::getMeta(); ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            margin: 0px;
        }

        .navbar {
            background: #003b81;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        .navbar-list {
            display: block;
            list-style: none;
            margin: 0px;
            padding: 0px;
        }

        .navbar-item {
            display: inline-block;
            padding: 0px 12px;
        }

        .navbar-item:first-child {
            padding: 0px 12px 0px 0px;
        }

        .navbar-item a {
            display: block;
            color: #ffffff;
            text-decoration: none;
            font-weight: 400;
            padding: 12px 0px;
        }

        .navbar-top {
            display: flex;
            justify-content: space-between;
            border-bottom: 2px solid #ffffff;
        }

        .navbar-logo {
            width: 325px;
            display: flex;
            align-items: center;
            color: #ffffff;
            letter-spacing: 0.7px;
            text-transform: uppercase;
            text-decoration: none;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 900;
            font-size: 1.3rem;
            padding: 12px 0px;
        }

        .navbar-acc {
            position: relative;
            display: flex;
            align-items: center;
            color: #ffffff;
            text-decoration: none;
            letter-spacing: 1px;
            font-weight: 400;
            font-size: 1.1rem;
        }

        .navbar-acc-author {
            border: none;
            cursor: pointer;
            background: #ffffff;
            color: #003b81;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: 0.9rem;
            padding: 12px 8px;
        }

        .navbar-acc-author:hover {
            
        }

        .navbar-acc-list {
            width: 100%;
            left: 0px;
            position: absolute;
            display: none;
            list-style: none;
            background: #f1f1f1;
            transform: translateY(81px);
            margin: 0px;
            padding: 0px;
        }

        .navbar-acc-item {
            display: block;
        }

        .navbar-acc-item a {
            display: block;
            color: #252525;
            text-decoration: none;
            font-weight: 400;
            padding: 4px 12px;
        }
        
        .navbar-acc-item a:hover {
            background: #c1c1c1;
        }

        .fa-caret-down {
            transition: 0.3s;
        }

        .navbar-acc-author:focus ~ .navbar-acc-list {
            display: block;
        }

        .navbar-acc-author:focus > .fa-caret-down {
            transform: rotate(180deg);
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="container">
            <ul class="navbar-list navbar-top">
                <li class="navbar-logo">Bekzod Group</li>
                <li class="navbar-acc">
                    <button class="navbar-acc-author">Жавохир Абдухалилов <i class="fas fa-caret-down"></i></button>
                    <ul class="navbar-acc-list">
                        <li class="navbar-acc-item"><a href=""><i class="fas fa-newspaper"></i> Кабинет</a></li>
                        <li class="navbar-acc-item"><a href=""><i class="fas fa-users-cog"></i> Профиль</a></li>
                        <li class="navbar-acc-item"><a href=""><i class="fas fa-sign-out-alt"></i> Покинуть</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-list">
                <li class="navbar-item"><a href="">О нас</a></li>
                <li class="navbar-item"><a href="">Контакт</a></li>
                <li class="navbar-item"><a href="">Вакансии</a></li>
            </ul>
        </div>
    </div>

    <?php
        foreach ($scripts as $script) {
            echo $script;
        }
    ?>
</body>
</html>