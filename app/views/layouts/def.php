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
            height: 100vh;
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

        .show {
            display: block;
            animation: show;
            transition: 0.5s;
        }

        .rotate {
            transform: rotate(180deg);
        }

        @keyframes show {
            0% {
                opacity: 0;
            },
            100% {
                opacity: 1;
            }
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
        <div class="container">
            <ul class="navbar-list navbar-top">
                <li class="navbar-logo">Bekzod Group</li>
                <li class="navbar-acc">
                    <button class="navbar-acc-author dropbtn" onclick="myFunction()">
                        <?php if (isset($_SESSION['user'])): ?>
                            <?php echo $_SESSION['user']['name'] ?>
                        <?php else: ?>
                            <?php __('log') ?>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['user'])): ?>
                            <i class="fas fa-caret-down"></i>
                        <?php endif; ?>
                    </button>
                    <?php if (isset($_SESSION['user'])): ?>
                        <ul class="navbar-acc-list">
                            <li class="navbar-acc-item"><a href="/dashboard/"><i class="fas fa-newspaper"></i> Кабинет</a></li>
                            <li class="navbar-acc-item"><a href="/user/"><i class="fas fa-user-cog"></i> Профиль</a></li>
                            <li class="navbar-acc-item"><a href="/user/logout"><i class="fas fa-sign-out-alt"></i> Покинуть</a></li>
                        </ul>
                    <?php endif; ?>
                </li>
            </ul>
            <ul class="navbar-list">
                <li class="navbar-item"><a href="">О нас</a></li>
                <li class="navbar-item"><a href="">Контакт</a></li>
                <li class="navbar-item"><a href="">Вакансии</a></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <?php echo $content; ?>
    </div>

    <?php
        foreach ($scripts as $script) {
            echo $script;
        }
    ?>

    <script>
        let dropdownBox = document.querySelector('.navbar-acc-list');
        let arrow = document.querySelector('.fa-caret-down');

        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function myFunction() {
            <?php if (!isset($_SESSION['user'])): ?>
                window.location = '/user/log';
            <?php else: ?>
                dropdownBox.classList.toggle("show");
                arrow.classList.toggle("rotate");
            <?php endif; ?>
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("navbar-acc-list");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                    if (arrow.classList.contains('rotate')) {
                        arrow.classList.remove('rotate');
                    }
                }
            }
        }

        let modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>