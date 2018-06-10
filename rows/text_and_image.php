 <div class="container strip text-and-image">
    <?php if (get_sub_field('full_background_image')) { ?>
      <?php 
        $image = get_sub_field('image');
        $size = 'full'; // (thumbnail, medium, large, full or custom size)
        $src = '';
        if( $image ) {
          $src = wp_get_attachment_image_src( $image, $size )[0];
        }
      ?>
      <div class="row bg" style="background-image: url('<?php echo $src ?>')">
        <div class="col-12 col-lg-5 offset-lg-6 text-wrapper">
          <div>
            <h2 class="header-link align-middle title"><?php the_sub_field('title'); ?></h2>   
            <div class="header-link align-middle"><?php the_sub_field('text'); ?></div>
          </div>
        </div>
      </div>
    <?php } else { ?>
      <div class="row">
        <div class="col-6">
          <div>
            <h2 class="header-link align-middle title"><?php the_sub_field('title'); ?></h2>   
            <div class="header-link align-middle"><?php the_sub_field('text'); ?></div>
          </div>
        </div>
        <div class="col-6">
          <?php 
            $image = get_sub_field('image');
            $size = 'full'; // (thumbnail, medium, large, full or custom size)

            if( $image ) {
              echo wp_get_attachment_image( $image, $size, "",array( "class" => "img-fluid" ) );
            }

          ?>
        </div>
      </div>
    <?php } ?>
  </div>