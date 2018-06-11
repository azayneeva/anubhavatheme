
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3 copy">
				<div>
	                <?php 
	                    $image = get_field('footer_logo', 'option');
	                    $size = 'full'; // (thumbnail, medium, large, full or custom size)

	                    if( $image ) {
	                        echo wp_get_attachment_image( $image, $size, "",array( "class" => "logo img-fluid" ) );
	                    }

	                ?>
				</div>
				<div class="text-color-light"><?php the_field('copyright', 'option'); ?></div>
				<div>
					<?php $post_id = get_field('privacy_policy', 'option', false); ?>

					<?php if( $post_id ) { ?>
						<a href="<?php echo get_the_permalink($post_id); ?>"><?php echo get_the_title($post_id); ?></a>
					<?php } ?>
				</div>
			</div>
			<div class="col-md-6">
				<?php 
					wp_nav_menu( array(
						'theme_location' => 'secondary',
						'items_wrap' => '<ul id="%1$s" class="%2$s list-unstyled">%3$s</ul>'
					) );
				?>
				<div class="contacts">
					<div class="text-color-light">
						<a href="phone:<?php the_field('phone_number', 'option'); ?>">
							<?php the_field('phone_number', 'option'); ?>
						</a>
					</div>
					<div>
						<a href="mailto:<?php the_field('email', 'option'); ?>">
							<?php the_field('email', 'option'); ?>
						</a>
					</div>
					<div>
						<a href="skype:<?php the_field('skype', 'option'); ?>">
							<span class="text-color-light">Skype:</span> <?php the_field('skype', 'option'); ?>
						</a>
					</div>
				</div>
				
			</div>
			<div class="col-md-2 offset-md-1 social">
				<?php
					// check if the repeater field has rows of data
					if( have_rows('social_links', 'options') ): ?>
					    <ul class="list-unstyled">
					    	<?php while ( have_rows('social_links', 'options') ) : the_row(); ?>
					    		<li>
						        	<a href="<?php the_sub_field('url'); ?>" target="_blank">
						        		<div class="img">
							        		<?php 
							                    $image = get_sub_field('logo');
							                    $size = 'thumbnail';

							                    if( $image ) {
							                        echo wp_get_attachment_image( $image, $size, "", array( "class" => "img-fluid" ) );
							                    }
							                ?>
						            	</div>
						        		<?php the_sub_field('name'); ?>
						        	</a>
						        </li>
					    	<?php endwhile; ?>
					    </ul>
					<?php endif;
				?>
			</div>
		</div>
	</div>
</footer>


<?php function the_single_training_footer() { ?>
  <div class="training">
  	<a href="<?php the_permalink()?>">
	    <span class="description"><?php the_field('date');?></span>,
	    <span class="title"><?php the_title();?></span>
	</a>
  </div>
<?php } ?>

<div id="menu-overlay" class="menu-overlay hidden">
	<div class="container">
		<div class="row">
			<div class="mt-2">
				<a href="#" id="close">
					<?xml version="1.0" encoding="UTF-8"?>
					<svg width="25px" height="27px" viewBox="0 0 25 27" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="square">
					        <g id="close" transform="translate(1.000000, 1.000000)" stroke="#FFFFFF" stroke-width="2">
					            <path d="M0.5,0.5 L22.5,24.5" id="Line"></path>
					            <path d="M0.5,0.5 L22.5,24.5" id="Line" transform="translate(11.500000, 12.500000) scale(1, -1) translate(-11.500000, -12.500000) "></path>
					        </g>
					    </g>
					</svg>
				</a>
			</div>
		</div>

		<div class = "row mt-5">
			<div class="col-3">
				<?php 
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'items_wrap' => '<ul id="%1$s" class="%2$s list-unstyled">%3$s</ul>'
					) );
				?>
			</div>
			<div class="col-6">
				<a href="<?php echo get_permalink(get_page_by_path('trainings')->ID) ?>">
					<h4>Тренинги</h4>	
				</a>
			  <?php 
			    $today = date('Ymd', strtotime('-1 day'));

			    $args = array(
			      'post_type' => 'trainings',
			      'post_status' => 'publish',
			      'posts_per_page' => -1,
			      'meta_query' => array(
			          array(
			              'key'       => 'available_until',
			              'value'     => $today,
			              'compare'   => '>',
			          ),
			      ),
			    );
			    $trainings = new WP_Query( $args );
			    if ( $trainings -> have_posts() ) {
			      while ( $trainings -> have_posts() ) {
			        $trainings->the_post();
			        the_single_training_footer();
			      }
			    }
			    wp_reset_query();
			  ?>
			</div>
			<div class="col-3">
				<?php 
					wp_nav_menu( array(
						'theme_location' => 'primary-2',
						'items_wrap' => '<ul id="%1$s" class="%2$s list-unstyled">%3$s</ul>'
					) );
				?>
			</div>
		</div>

  
		<div class="contacts row d-flex justify-content-around mt-5">
			<a href="phone:<?php the_field('phone_number', 'option'); ?>">
				<?php the_field('phone_number', 'option'); ?>
			</a>
			<a href="mailto:<?php the_field('email', 'option'); ?>">
				<?php the_field('email', 'option'); ?>
			</a>
			<a href="skype:<?php the_field('skype', 'option'); ?>">
				<span class="text-color-light">Skype:</span> <?php the_field('skype', 'option'); ?>
			</a>
		</div>
	</div>
</div>

<script>
	document.addEventListener('keydown', function(e){
		if (e.code === 'Escape') {
			document.getElementById('menu-overlay').classList.add("hidden")	
		}
	})

	document.getElementById('close').addEventListener('click', function(e){
		e.preventDefault()
		document.getElementById('menu-overlay').classList.add("hidden")
	})
</script>

<?php wp_footer(); ?>

</body>
</html>
