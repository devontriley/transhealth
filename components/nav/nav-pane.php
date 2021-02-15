<div id="nav-pane" data-animate="slide-in"> <!-- data-animate options: slide-in, clip-path -->
    <div class="inner">
        <?php
        $navMenu = wp_get_menu_array('nav-pane-menu');

        if ($navMenu) {
            echo '<ul id="nav-pane-menu" class="menu">';
            $menuCounter = 1;
            foreach ($navMenu as $k => $v) {
                $classes .= ' menu-item menu-item-' . $v['ID'];

                echo '<li id="menu-item=' . $v['ID'] . '" class="' . $classes . '">';
                echo '<a href="' . $v['url'] . '">';
                echo '<span class="integer">0' . $menuCounter . '/</span>';
                echo $v['title'];
                echo '</a>';
                echo '</li>';

                $menuCounter++;
            }
            echo '</ul>';
        }
        ?>
    </div>
</div>