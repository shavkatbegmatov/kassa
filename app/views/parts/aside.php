<?php

use framework\core\App;

$user = new \app\models\User();

?>

<?php if ($user::isAdmin()): ?>
    <div class="panel panel-default">
        <div class="list-group">
            <a href="/admin/" class="list-group-item list-group-item-action">Dashboard</a>
        </div>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['user'])): ?>
    <div class="panel panel-default">
        <div class="panel-heading"><a href="/user/"><?php __('cabinet'); ?></a></div>
        <div class="panel-body">
            asd
        </div>
        <div class="list-group">
            <a href="/user/" class="list-group-item list-group-item-action"><?php __('cabinet'); ?></a>
            <a style="width:100%" href="/user/logout" class="btn btn-danger"><?php __('logout'); ?></a>
        </div>
    </div>
<?php else: ?>
    <a style="margin-bottom: 24px;" href="/user/log" class="btn btn-success"><?php __('log'); ?></a>
    

<?php endif; ?>




<?php new \framework\widgets\language\Language(); ?>
<div class="panel panel-default">
    <div class="panel-heading"><?php __('catalog'); ?></div>
    <div class="list-group">
        <?php
            $catalog = \R::findAll('catalog');
        ?>
        <?php foreach ($catalog as $catalogItem): ?>
            <a href="/product/<?php echo $catalogItem['id']; ?>" class="list-group-item list-group-item-action"><?php echo $catalogItem['name']; ?></a>
        <?php endforeach; ?>
    </div>
</div>

<?php
    $lang = App::$app->getProperty('lang')['code'];
    $recentBlog = \R::findAll('blog', 'lang = ?', [$lang]);
    $recentArray = array_reverse($recentBlog);
    $recent = array_slice($recentArray,0,4);
?>

<?php if (!empty($recentBlog)): ?>
    <div class="panel panel-default">
        <div class="panel-heading"><?php __('recent-posts'); ?></div>
        <div class="list-group">
            <?php foreach ($recent as $recentItem): ?>
                <a href="#" class="list-group-item list-group-item-action"><?php echo $recentItem['title']; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>