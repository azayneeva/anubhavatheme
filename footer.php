
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
						        	<a href="<?php the_sub_field('url'); ?>">
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

<?php wp_footer(); ?>

</body>
</html>
