<div class="nav" id="flyout-menu">
    <?php
    $mainMenu = wp_get_menu_array('mobile-nav-menu');

    if ($mainMenu) {
        $pageTitle = get_the_title();

        echo '<div class="menu-main-menu-container">';
        echo '<ul id="menu-main-menu" class="menu">';

        foreach ($mainMenu as $k => $v) {
            $current = ($v['title'] == get_the_title()) ? 'current' : ''; ?>

            <li id="menu-item=<?php echo $v['ID'] ?>" class="menu-item menu-item-<?php echo $v['ID'] ?> <?php echo $current ?>">
                <a class="item-link" href="<?php echo $v['url'] ?>"><?php echo $v['title'] ?></a>
                <svg width="10.86px" height="16.8px" iewBox="0 0 10.86 16.8">
                    <use href="#right-arrow" />
                </svg>
            </li>

        <?php }

        echo '</ul>';
        echo '</div>';
    }

    ?>
</div>