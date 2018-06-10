  <div class="container strip image">
    <div class="row">
      <div class="header col-12 text-center">
        <?php 
          $image = get_sub_field('image');
          $size = 'full'; // (thumbnail, medium, large, full or custom size)

          if( $image ) {
            echo wp_get_attachment_image( $image, $size, "",array( "class" => "img-fluid" ) );
          }

        ?>
      </div>
    </div>  
  </div>