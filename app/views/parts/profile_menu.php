<button class="navbar-acc-author dropbtn" onclick="myFunction()">
    <?php if (isset($_SESSION['user'])): ?>
        <?php echo $_SESSION['user']['name'] ?>
    <?php else: ?>
        <?php __('log')?>
    <?php endif;?>
    <i class="fas fa-caret-down"></i>
</button>
<?php if (isset($_SESSION['user'])): ?>
    <ul class="navbar-acc-list list-acc">
        <li class="navbar-acc-item"><a href="<?php echo SUB ?>/<?php echo $_SESSION['user']['role'] ?>/"><i class="fas fa-newspaper"></i> Кабинет</a></li>
        <li class="navbar-acc-item"><a href="<?php echo SUB ?>/user/"><i class="fas fa-user-cog"></i> Профиль</a></li>
        <li class="navbar-acc-item"><a href="<?php echo SUB ?>/user/logout"><i class="fas fa-sign-out-alt"></i> Покинуть</a></li>
    </ul>
<?php else: ?>
    <div class="navbar-acc-list form-acc noclose">
        <form method="post" action="<?php echo SUB ?>/user/log" class="form noclose">
            <div><i class="fas fa-user noclose"></i><input type="text" class="input noclose" name="login" placeholder="Enter Login"></div>
            <div><i class="fas fa-key noclose"></i><input type="password" class="input noclose" name="password" placeholder="Enter Password"></div>
            <button onclick="alert('123');" class="button noclose" type="submit">Submit2</button>
        </form>
    </div>
<?php endif;?>

<script>
    let dropdownBox = document.querySelector('.navbar-acc-list');
    let arrow = document.querySelector('.fa-caret-down');

    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        dropdownBox.classList.toggle("show");
        arrow.classList.toggle("rotate");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.classList.contains('noclose')) {
            if (!event.target.matches('.dropbtn')) {
                let dropdowns = document.getElementsByClassName("navbar-acc-list");
                let i;
                for (i = 0; i < dropdowns.length; i++) {
                    let openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                    if (arrow.classList.contains('rotate')) {
                        arrow.classList.remove('rotate');
                    }
                }
            }
        }
    }
</script>