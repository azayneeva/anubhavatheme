<?php function the_single_exhibition() { ?>
  <div class="exhibition col-4">
    <a href="<?php the_permalink()?>">
      <span class="description"><?php the_field('date');?></span>,
      <span class="title"><?php the_title();?></span>
    </a>
  </div>
<?php } ?>

  <div class="container strip upcoming-exhibitions">
    <div class="grid row">
      <a class="col-2 offset-1" href="<?php get_permalink(get_page_by_path('exhibitions'))?>">
        <h6>ВЫСТАВКИ</h6>
      </a>
      <?php 
        $today = date('Ymd', strtotime('-1 day'));

        $args = array(
          'post_type' => 'exhibitions',
          'post_status' => 'publish',
          'posts_per_page' => 2,
          'meta_query' => array(
              array(
                  'key'       => 'available_until',
                  'value'     => $today,
                  'compare'   => '>',
              ),
          ),
        );
        $exhibitions = new WP_Query( $args );
        if ( $exhibitions -> have_posts() ) {
          while ( $exhibitions -> have_posts() ) {
            $exhibitions->the_post();
            the_single_exhibition();
          }
        }
        wp_reset_query();
      ?>
    </div>
  </div>