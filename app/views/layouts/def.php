<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php \framework\core\base\View::getMeta(); ?>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap-grid.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            height: 100vh;
            margin: 0px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
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
            min-width: 150px;
            height: 100%;
            display: block;
            border: none;
            cursor: pointer;
            background: #ffffff;
            color: #003b81;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: 0.9rem;
            /* padding: 12px 24px; */
        }

        .navbar-acc-author:hover {
            
        }

        .navbar-acc-list {
            width: 200%;
            left: -150px;
            position: absolute;
            display: none;
            list-style: none;
            background: #f1f1f1;
            margin: 0px;
            padding: 0px;
        }

        .navbar-acc-item {
            display: block;
        }

        .list-acc {
            transform: translateY(81px);
        }

        .form-acc {
            transform: translateY(106px);
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

        .show {
            display: block;
            animation: show;
            transition: 0.5s;
        }

        .rotate {
            transform: rotate(180deg);
        }

        .form {
            margin: 0px 32px 0px 0px;
            padding: 12px 16px;
        }
        
        .form > div {
            display: flex;
            align-items: center;
        }

        .form i {
            color: #252525;
            margin-right: 12px;
        }

        .input {
            width: 100%;
            padding: 8px 12px;
            margin: 0px 0px 12px 0px;
        }

        @keyframes show {
            0% {
                opacity: 0;
            },
            100% {
                opacity: 1;
            }
        }

        .button {
            width: 100%;
            border: none;
            background: #003b81;
            color: #ffffff;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            padding: 8px 12px;
            cursor: pointer;
        }

        .container {
            min-height: 100vh;
            max-width: 1170px;
            margin: 0px auto;
            padding: 0px 12px;
        }
        .navbar-container {

            max-width: 1170px;
            margin: 0px auto;
            padding: 0px 0px;
        }

        .message {
            padding: 12px 24px;
            border: 1px solid orange;
            background: yellow;
            color: #252525;
        }
    </style>
</head>
<body>

    <?php
        $tag = '';

        if (isset($_SESSION['user'])) {
            $tag = 'button';
        } else {
            $tag = 'a';
        }
    ?>

    <div class="navbar">
        <div class="navbar-container">
            <ul class="navbar-list navbar-top">
                <li class="navbar-logo">Bekzod Group</li>
                <li class="navbar-acc">
                    <?php framework\core\base\View::getPart('parts/profile_menu'); ?>
                </li>
            </ul>
            <ul class="navbar-list">
                <?php framework\core\base\View::getPart('parts/menu'); ?>
            </ul>
        </div>
    </div>

    <div class="container">
        <?php if (isset($_SESSION['error'])): ?>
            <p class="message">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </p>
        <?php endif; ?>
        <?php echo $content; ?>
    </div>

    <?php
        foreach ($scripts as $script) {
            echo $script;
        }
    ?>


</body>
</html>