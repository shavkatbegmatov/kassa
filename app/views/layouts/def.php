<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php \framework\core\base\View::getMeta(); ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap-grid.min.css">

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
            border-bottom: 1px solid #002e66;
            padding: 12px 0px;
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
            background: transparent;
            color: #ffffff;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: 0.9rem;
        }

        .navbar-acc-list {
            width: 100%;
            left: 0px;
            position: absolute;
            display: none;
            list-style: none;
            background: #ffffff;
            transform: translateY(50px);
            margin: 0px;
            padding: 0px;
        }

        .navbar-acc-item {
            display: inline-block;
            padding: 0px 12px;
        }

        .navbar-acc-item:first-child {
            padding: 0px 12px 0px 0px;
        }

        .navbar-acc-item a {
            display: block;
            color: #ffffff;
            text-decoration: none;
            font-weight: 400;
            padding: 12px 0px;
        }

        .navbar-acc-author:focus ~ .navbar-acc-list {
            display: block;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="container">
            <ul class="navbar-list navbar-top">
                <li class="navbar-logo">Bekzod Group</li>
                <li class="navbar-acc">
                    <button class="navbar-acc-author">Жавохир Абдухалилов</button>
                    <ul class="navbar-acc-list">
                        <li class="navbar-acc-item"><a href="">Кабинет</a></li>
                        <li class="navbar-acc-item"><a href="">Профиль</a></li>
                        <li class="navbar-acc-item"><a href="">Покинуть</a></li>
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