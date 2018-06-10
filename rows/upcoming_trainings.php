<?php function the_single_training() { ?>
  <div class="training col-6">
    <span class="description"><?php the_field('date');?></span>,
    <span class="title"><?php the_title();?></span>
  </div>
<?php } ?>

  <div class="container strip gallery">
    <div class="grid row">
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
            the_single_training();
          }
        }
        wp_reset_query();
      ?>
    </div>
  </div>