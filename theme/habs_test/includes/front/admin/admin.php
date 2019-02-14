<?php

function data_dashboard_register()
{
    add_menu_page(
        'Data Dashboard',     // page title
        'Data Dashboard',     // menu title
        'manage_options',   // capability
        'data-dashboard',     // menu slug
        'data_dashboard_render', // callback function
        'dashicons-chart-pie', //menu icon
        '3'
    );
}
function data_dashboard_render()
{ 
    global $title;
    ?>

    <div class="wrap">

    <header>
        <h1 class='title'> <?php echo $title ?> </h1>
    </header>
    <?php include 'data-dashboard-container.php' ?>
</div>

<?php
    
}