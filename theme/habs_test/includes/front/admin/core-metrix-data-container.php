
<?php

    global $wpdb;

    $metrixTypeArray = array(
        array(
        'key'     => 'core_metrix_type',
        'value'   => '1', //slider
        ),
        array(
        'key'     => 'core_metrix_type',
        'value'   => '2', //trade-index
        )
    );

    ?>
    <h1 class="title">Trade Index</h1>
    <?php

    $args = array(
        'post_type' => 'core_metrix',
        'meta_query' => array( $metrixTypeArray[1] )
    );
    $trade_index_query = new WP_Query($args);


    if ($trade_index_query->have_posts()){
        while ($trade_index_query->have_posts()){
            $trade_index_query->the_post();
             
             $coreData	= $wpdb->get_results(
                "SELECT poll_id as poll_id, rating as rating, COUNT(*) as ratingCount FROM `" . $wpdb->prefix . "core_metrix_ratings` WHERE poll_type='" . "tradeIndex" . "' AND poll_id='" . get_the_id() . "'  GROUP BY rating ORDER BY poll_id DESC"
            );
            $average = round($wpdb->get_var(
				"SELECT AVG(`rating`) FROM `" . $wpdb->prefix . "core_metrix_ratings`  WHERE poll_id='" . get_the_id() . "'"
			), 2);
            
            if(sizeof($coreData)>0){
                include 'trade-index-data.php';
            }
            };
            if(sizeof($coreData)<=0){
                include 'no-data-template.php';
            }
        }else{
          echo "<h5>To create a trade index core metrix, click on the Core Metrix icon and add new</h5>";
        } ?>

        <h1 class="title">Slider</h1>
        <?php

        $args = array(
            'post_type' => 'core_metrix',
            'meta_query' => array( $metrixTypeArray[0] )
        );
        $trade_index_query = new WP_Query($args);
    
    
        if ($trade_index_query->have_posts()){
            while ($trade_index_query->have_posts()){
                $trade_index_query->the_post();
                   
                 $coreData	= $wpdb->get_results(
                    "SELECT poll_id as poll_id, rating as rating, COUNT(*) as ratingCount FROM `" . $wpdb->prefix . "core_metrix_ratings` WHERE poll_type='" . "slider" . "' AND poll_id='" . get_the_id() . "'  GROUP BY rating ORDER BY poll_id DESC"
                );
                if(sizeof($coreData)>0){
                    include 'slider-data.php';
                }
                };
                if(sizeof($coreData)<=0){
                    include 'no-data-template.php';
                }
            }else{
                echo "<h5>To create a slider core metrix, click on the Core Metrix icon and add new</h5>";
            } ?>

