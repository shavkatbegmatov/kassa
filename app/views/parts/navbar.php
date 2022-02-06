<style>
    .navbar-logo a {
        color: white;
        text-decoration: none;
    }
</style>
<div class="navbar">
    <div class="navbar-container">
        <ul class="navbar-list navbar-top">
            <li class="navbar-logo"><a href="/">Bekzod Group</a></li>
            <li class="navbar-acc">
                <?php framework\core\base\View::getPart('parts/profile_menu'); ?>
            </li>
        </ul>
        <ul class="navbar-list">
            <?php framework\core\base\View::getPart('parts/menu'); ?>
        </ul>
    </div>
</div>