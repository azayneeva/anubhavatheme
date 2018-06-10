<?php
  $images = get_sub_field('gallery');
  $size = 'full'; // (thumbnail, medium, large, full or custom size)
  if( $images ) { ?>
    <div class="container strip slider">
      <div class="row">
        <div class="col-12">
          <div class="siema">
            <?php foreach( $images as $image ): ?>
              <div class="item">
                <?php echo wp_get_attachment_image( $image['ID'], $size, "",array( "class" => "img-fluid" ) ); ?>
              </div>
            <?php endforeach; ?>
          </div>
          <a class="prev"><span><</span></a>
          <a class="next"><span>></span></a>
        </div>
      </div>
    </div>

    <script>
      var mySiema = new Siema({
        selector: '.siema',
        perPage: {
          576:2,
          768:3,
          992:4
        },
        loop: true,
      })

      var prev = document.querySelector('.prev')
      var next = document.querySelector('.next')

      prev.addEventListener('click', function(){ mySiema.prev() })
      next.addEventListener('click', function(){ mySiema.next() })

    </script>
<?php } ?>