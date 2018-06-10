  <?php
    $args = array( 'numberposts' => '1' );
    $recent_posts = wp_get_recent_posts( $args );
    foreach( $recent_posts as $recent ){ 
      $post_id = $recent["ID"]
      ?>
      <div class="container strip latest-blog">
        <div class="row">
          <div class="col-4">
            <div class="text-wrapper">
              <div>
                <a href="<?php get_permalink($post_id) ?>">
                  <h6>Blog</h6>
                  <h2><?php echo get_the_title($post_id); ?></h2>
                  <div><?php echo get_post_field('post_excerpt', $post_id); ?></div>
                  <div class="read-more">
                    Read more
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="col-8">
            <div>
              <?php echo get_the_post_thumbnail( $post_id, 'large',array( "class" => "img-fluid" )  ); ?>
            </div>
          </div>
        </div>
      </div>
    <?php }
    wp_reset_query();
  ?>