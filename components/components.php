<?php
$pageID = (is_post_type_archive('tribe_events')) ? 365 : $post->ID;
$moduleCounter = 0;

if(have_rows('components', $pageID)) :
    while(have_rows('components', $pageID)):
        the_row();

        switch(get_row_layout())
        {
            // HERO
            case 'hero' :
                include('heroes/hero.php');
                break;

            //GRID
            case 'grid' :
                include('grids/grid.php');
                break;

            //RTE
            case 'rte' :
                include('rtes/rte.php');
                break;

            //SLIDER
            case 'slider' :
                include('slider.php');
                break;

            //FAQS
            case 'faqs' :
                include('faqs.php');
                break;

            //EVENTS TOOL
            case 'events_tool' :
                include('events-tool.php');
                break;

            //CONTACT FORM MODULE
            case 'contact_form_module' :
                include('forms/form--module.php');
                break;

            //CAREERS FORM MODULE
            case 'careers_form_module' :
                //include('forms/careers--module.php');
                include('forms/form--module.php');
                break;
        }
        $moduleCounter++;
    endwhile;
endif;

?>