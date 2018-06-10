  <?php 
  $post_ids = get_sub_field('pages', false, false);

  if( $post_ids ): ?>
    <div class="container strip links-to-3-pages">
      <div class="row">
        <?php foreach( $post_ids as $post_id ): ?>
        <div class="col-4">
          <a href="<?php echo get_the_permalink($post_id); ?>">
            <h3 class="text-center">
              <?php echo get_the_title($post_id); ?>
            </h3>
            <div class="image">
              <?php echo get_the_post_thumbnail( $post_id, 'large', array( "class" => "img-fluid" )  ); ?>
            </div>
            <div class="footer">
              <div class="description">
                <?php echo get_post_field('post_content', $post_id); ?>
              </div>
              <div class="read-more">
                Read more
              </div>
            </div>
          </a>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>