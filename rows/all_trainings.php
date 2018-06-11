<?php function the_single_training($reverse) { ?>
  <div class="grid row strip">
    <div class="col-md-8 <?php echo $reverse?'order-md-2':'' ?>">
      <?php echo get_the_post_thumbnail(false,'large',array( "class" => "img-fluid" )  ); ?>
    </div>
    <div class="training col-md-4 <?php echo $reverse?'order-md-1':'' ?>">
      <div class="text-wrapper">
        <div>
          <h6>Тренинг</h6>
          <div><?php the_field('date');?></div>
          <h2><?php the_title();?></h2>
          <div><?php the_excerpt();?></div>
          <a class="read-more" href="<?php the_permalink(); ?>">Read more</a>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<div class="container strip all-trainings">
    <?php 
      $today = date('Ymd', strtotime('-1 day'));

      $args = array(
        'post_type' => 'trainings',
        'post_status' => 'publish',
        'posts_per_page' => -1,
      );
      $trainings = new WP_Query( $args );
      if ( $trainings -> have_posts() ) {
        $index = 0;
        while ( $trainings -> have_posts() ) {
          $trainings->the_post();
          the_single_training($index%2);
          $index++;
        }
      }
      wp_reset_query();
    ?>
</div>