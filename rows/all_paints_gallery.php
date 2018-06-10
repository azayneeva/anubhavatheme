<?php function the_single_paint_from_gallery() { ?>
  <?php
    $image = get_field('image');
    if( !$image ) return '';

    $sizes = wp_get_attachment_image_src( $image, 'full');
    $width = $sizes[1];
    $height = $sizes[2];
    $is8col = $width>$height;
    $colsCount = $is8col?'8':'4';
    $imgSize = $is8col?'gallery_large_xl_8col':'gallery_large_xl_4col';

    $imageTag = wp_get_attachment_image( $image, $imgSize, "",array( "class" => "img-fluid" ) );

  ?>
  <div class="painting col-<?php echo $colsCount; ?>" data-col="<?php echo $colsCount?>">
    <?php echo $imageTag; ?>
    <h5 class="title"><?php the_field('title');?></h5>
    <div class="description"><?php the_field('description');?></div>
    <div class="size"><?php the_field('width'); ?>x<?php the_field('height'); ?> см</div>
  </div>
<?php } ?>

  <div class="container strip gallery">
    <div class="grid row">
      <?php 
        $args = array(
          'post_type' => 'paintings',
          'post_status' => 'publish',
          'posts_per_page' => -1
        );
        $paintings = new WP_Query( $args );
        if ( $paintings -> have_posts() ) {
          while ( $paintings -> have_posts() ) {
            $paintings->the_post();
            the_single_paint_from_gallery();
          }
        }
        wp_reset_query();
      ?>
    </div>
  </div>
  <script>
    var container = document.querySelectorAll('.gallery .grid')[0]
    var imagesNodes = document.querySelectorAll('.gallery .painting')
    var images = Array
      .from(imagesNodes)
      .map(el=>({
        node: el,
        col: Number(el.getAttribute('data-col'))
      }))
    var images4 = images.filter(el=>el.col==4).map(el=>el.node)
    var images8 = images.filter(el=>el.col==8).map(el=>el.node)

    container.innerHTML = ''
    while (images4.length && images8.length) {
      container.appendChild(images4.shift())
      container.appendChild(images8.shift())
    }

    while (images4.length) container.appendChild(images4.shift())
    while (images8.length) container.appendChild(images8.shift())
  </script>