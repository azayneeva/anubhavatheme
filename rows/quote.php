  <div class="container strip quote">
    <div class="row">
      <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-12">
        <h5 class="text-center text"><strong><?php the_sub_field('quote'); ?></strong></h5>
        <div class="text-center">
        	<?php $link = get_sub_field('link'); ?>
			<?php if( $link ): ?>
				<a class="button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
			<?php endif; ?>
        </div>
      </div>
    </div>
  </div>