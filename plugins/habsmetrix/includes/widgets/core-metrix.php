<?php
// creates widget

class R_Daily_Corem_Metrix_Widget extends WP_Widget
{
	/**
	 * Sets up the widgets name etc
	 */
	public function __construct()
	{
		$widget_ops = array(
			'description' => 'Displays all core metrix',
		);
		parent::__construct(
			'r_daily_core_metrix_widget',
			'Core Metrix',
			$widget_ops
		);
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form($instance)
	{
        // outputs the options form on admin
		$default = array('title' => 'Core Metrix');
		$instance = wp_parse_args((array)$instance, $default);

		?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title: </label>
            <input type="text" class="widefat"
            id="<?php echo $this->get_field_id('title'); ?>"
            name="<?php echo $this->get_field_name('title'); ?>"
            value="<?php echo esc_attr($instance['title']); ?>">
        </p>

        <?php

	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update($new_instance, $old_instance)
	{
        // processes widget options to be saved

		$instance = [];
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget($args, $instance)
	{
        // outputs the content of the widget
		extract($args);
		extract($instance);

		$title = apply_filters('widget_title', $title);

		echo $before_widget;
		echo "<h1 class='title is-3 is-lime'>" . $title . "</h1>";

		$metrixTypeArray = array(
			array(
			'key'     => 'core_metrix_type',
			'value'   => '1', //slider
			),
			array(
			'key'     => 'core_metrix_type',
			'value'   => '2', //trade-index
			),
			array(
			'key'     => 'core_metrix_type',
			'value'   => '3', //fire-index
			)
		);

		$categoryArray = array(
			array(
			'key'     => 'info_category',
			'value'   => 'Player',
			),
			array(
			'key'     => 'info_category',
			'value'   => 'Management',
			),
		);

		$questionArray = array(
			array(
				'key'	=> 'core_question',
				'value'	=> 'Salary'
			),
			array(
				'key'	=> 'core_question',
				'value'	=> 'Performance'
			)
		);

		global $wpdb;

		$user_IP		= $_SERVER['REMOTE_ADDR'];
		$user_ID			= get_current_user_id();
		$user_logged_in		= is_user_logged_in();

		$total_core = $wpdb->get_var(
			"SELECT COUNT(*) FROM `" . $wpdb->prefix . "posts` WHERE post_type='" . "core_metrix" . "' AND post_status= '" . "publish" . "'"
		);

		if($user_logged_in){
			$answered_core = $wpdb->get_results(
				"SELECT COUNT(*) FROM `" . $wpdb->prefix . "core_metrix_ratings` WHERE user_id='" . $user_ID . "'  GROUP BY poll_id ORDER BY poll_id DESC"
			);

		} else {
			$answered_core 	= $wpdb->get_results(
				"SELECT COUNT(*) FROM `" . $wpdb->prefix . "core_metrix_ratings` WHERE user_ip='" . $user_IP . "' AND user_id='" . $user_ID . "' GROUP BY poll_id ORDER BY poll_id DESC"
			);
		}


		$percentage_progress = round((sizeof($answered_core)*100)/$total_core);

		$progress_text = "Roaster management progress";
	
		?>

		<!-- template trade index -->
		<div class="progress-container">
			<h1 class=" is-5 is-uppercase has-text-weight-semibold has-text-white"><?php echo $progress_text ?> <?php echo $percentage_progress ?>%</h1>
			<div class="progress-bar-container" style="width:100%; background-color:#363636;">
				<div class="progress-bar" 
				style="width:<?php echo $percentage_progress ?>%; height:13px; background-image: linear-gradient(to right, #e6ff00, green);">
					<p class="title is-6"><?php echo $percentage_progress ?>%</p>
				</div>
			</div>
		</div>

		<div class="">
			<?php
			$args = array(
				'post_type' => 'core_metrix',
				'posts_per_page' => 100,
				'meta_query' => array( $metrixTypeArray[1], $categoryArray[0] )
			);
			$the_query = new WP_Query($args);
			if ($the_query->have_posts()) : ?>
				<div class="" id="headingOne">
					<h5 class="">
						<button class="button full-width title is-6 buttonToggle" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
						Players Trade Index <i class="fas fa-angle-double-down fa-1x"></i>
						</button>
					</h5>
				</div>
				<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
					<div class="">
							<!-- the loop -->
							<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
							<div class="box has-background-dark is-pulled-right" style="border: 1px solid grey; width:97%;">
								<div> <?php  the_content(); ?> </div>
							</div>
							<?php endwhile; ?>
				</div>
			</div>
			<?php endif; ?>	
		  </div>
		  
		  <div class="">
			<?php
			$args = array(
				'post_type' => 'core_metrix',
				'posts_per_page' => 100,
				'meta_query' => array( $metrixTypeArray[2], $categoryArray[1] )
			);
			$the_query = new WP_Query($args);
			if ($the_query->have_posts()) : ?>
				<div class="" id="headingTwo">
					<h5 class="">
						<button class="button full-width title is-6 buttonToggle" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						Management Fire Index <i class="fas fa-angle-double-down fa-1x"></i>
						</button>
					</h5>
				</div>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
					<div class="">
							<!-- the loop -->
							<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
							<div class="box has-background-dark is-pulled-right" style="border: 1px solid grey; width:97%;">
								<div> <?php  the_content(); ?> </div>
							</div>
							<?php endwhile; ?>
					</div>
				</div>
			<?php endif; ?>	
	  	</div>


		<!-- template for sliders -->
		<div class="">
		<?php
			$args = array(
				'post_type'  => 'core_metrix',
				'posts_per_page' => 100,
				'meta_query' => array( $metrixTypeArray[0], $categoryArray[0], $questionArray[1] ),
			);

			$the_query_slider = new WP_Query($args);
			if ($the_query_slider->have_posts()) : ?>
			
				<div class="" id="headingThree">
					<h5 class="">
						<button class="button full-width title is-6 buttonToggle" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
						Satisfaction with the team players <i class="fas fa-angle-double-down fa-1x"></i>
						</button>
					</h5>
				</div>
		
				<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
					<div class="">	 
						<!-- the loop -->
						<?php while ($the_query_slider->have_posts()) : $the_query_slider->the_post();
						?>
						<div class="box has-background-dark is-pulled-right" style="border: 1px solid grey; width:97%;">
							<div> <?php  the_content(); ?> </div>
						</div>
						<?php endwhile; ?>
					</div>
				</div>
			<?php endif; ?>	
		  </div>

		  <div class="">
		<?php
			$args = array(
				'post_type'  => 'core_metrix',
				'posts_per_page' => 100,
				'meta_query' => array( $metrixTypeArray[0], $categoryArray[0], $questionArray[0] ),
			);

			$the_query_slider = new WP_Query($args);
			if ($the_query_slider->have_posts()) : ?>
			
				<div class="" id="headingFive">
					<h5 class="">
						<button class="button full-width title is-6 buttonToggle" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
						Players salary <i class="fas fa-angle-double-down fa-1x"></i>
						</button>
					</h5>
				</div>
		
				<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
					<div class="">	 
						<!-- the loop -->
						<?php while ($the_query_slider->have_posts()) : $the_query_slider->the_post();
						?>
						<div class="box has-background-dark is-pulled-right" style="border: 1px solid grey; width:97%;">
							<div> <?php  the_content(); ?> </div>
						</div>
						<?php endwhile; ?>
					</div>
				</div>
			<?php endif; ?>	
		  </div>
		  
		  <!-- template for  management team sliders-->
		  <div class="">
		<?php
			$args = array(
				'post_type'  => 'core_metrix',
				'posts_per_page' => 100,
				'meta_query' => array( $metrixTypeArray[0], $categoryArray[1], $questionArray[1] ),
			);

			$the_query_slider = new WP_Query($args);
			if ($the_query_slider->have_posts()) : ?>
			
				<div class="" id="headingFour">
					<h5 class="">
						<button class="button full-width title is-6 buttonToggle" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
						Satisfaction with the management team <i class="fas fa-angle-double-down fa-1x"></i>
						</button>
					</h5>
				</div>
		
				<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
					<div class="">	 
						<!-- the loop -->
						<?php while ($the_query_slider->have_posts()) : $the_query_slider->the_post();
						?>
						<div class="box has-background-dark has-text-white">
							<div> <?php  the_content(); ?> </div>
						</div>
						<?php endwhile; ?>
					</div>
				</div>
			<?php endif; ?>	
		  </div>

		  	<div class="">
		<?php
			$args = array(
				'post_type'  => 'core_metrix',
				'posts_per_page' => 100,
				'meta_query' => array( $metrixTypeArray[0], $categoryArray[1], $questionArray[0] ),
			);

			$the_query_slider = new WP_Query($args);
			if ($the_query_slider->have_posts()) : ?>
			
				<div class="" id="headingSix">
					<h5 class="">
						<button class="button full-width title is-6 buttonToggle" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
						Management Salary <i class="fas fa-angle-double-down fa-1x"></i>
						</button>
					</h5>
				</div>
		
				<div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
					<div class="">	 
						<!-- the loop -->
						<?php while ($the_query_slider->have_posts()) : $the_query_slider->the_post();
						?>
						<div class="box has-background-dark" style="border: 1px solid grey; width:97%;">
							<div> <?php  the_content(); ?> </div>
						</div>
						<?php endwhile; ?>
					</div>
				</div>
			<?php endif; ?>	
		  </div>
	<?php echo $after_widget;
	}
}