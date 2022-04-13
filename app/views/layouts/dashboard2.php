<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php \framework\core\base\View::getMeta(); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo SUB ?>/public/css/style.css">
    <style>
        * {
            outline: none !important;
        }

        body .bootstrap-select .dropdown-toggle:focus {
            outline: none !important;
        }

        .nav-link, .nav-active a {
            display: flex;
            width: 45px;
            height: 45px;
            justify-content: center;
            align-items: center;
            background: #0c84ff;
            color: #fff;
        }

        .selectpicker {
            outline: none;
        }

        .bootstrap-select {
            width: 100% !important;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
<div class="container-fluid">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">   <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="<?php echo SUB ?>/">Dashboard</a>
        </div>
        <div class="collapse navbar-collapse js-navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/admin/blog/create">Блог</a></li>
                <li><a href="/admin/catalog/create">Каталог</a></li>
            </ul>
        </div>
        <!-- /.nav-collapse -->
    </nav>

    <div class="row">
        <div class="col-md-3">
            <?php $this->getPart('parts/dashboard/aside'); ?>
        </div>
        <div class="col-md-9">

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                </div>
            <?php endif; ?>

            <?php
            if (isset($_SESSION['user'])) {
                if ($_SESSION['user']['role'] == '3') {
                    echo 'You are Admin';
                }
            }
            ?>

            <?php echo $content; ?>

            <!-- <pre>Hello, RedBeanPHP</pre> -->
        </div>
    </div>
</div>

<?php
//        debug(\framework\core\base\Lang::$langData);
?>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="/js/main.js"></script>
<?php
foreach ($scripts as $script) {
    echo $script;
}
?>
</body>

</html>