<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php function the_header() { ?>
    <div class="container strip header">
        <div class="row">
            <div class="bg-wrapper col-12" style="background-image: url('<?php the_sub_field('background');?>')">
                <div class="text-center">
                    <h2 class="header-text"><?php the_sub_field('title'); ?></h2>
                    <h3 class="header-link"><?php the_sub_field('link'); ?></h3>    
                </div>
            </div>
        </div>  
    </div>
 <?php } ?>

<?php function the_image() { ?>
    <div class="container image strip">
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
 <?php } ?>


<?php function the_quote() { ?>
    <div class="container strip">
        <div class="row">
            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-12">
                <h5 class="text-center text"><strong><?php the_sub_field('quote'); ?></strong></h5>
                <div class="text-center quote-link"><?php the_sub_field('link'); ?></div>
            </div>
        </div>
    </div>
<?php } ?>

<?php function the_text() { ?>
    <div class="container strip">
        <div class="row">
            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-12">
                <strong>
                    <?php the_sub_field('text'); ?>
                </strong>
            </div>
        </div>
    </div>
<?php } ?>

<?php function the_text_and_image() { ?>
    <div class="container text-and-image strip">
        <div class="row bg" style="background-image: url('<?php the_sub_field('image'); ?>')">
            <div class="col-12 col-lg-5 offset-lg-6 text-wrapper">
                <div>
                    <h2 class="header-link align-middle title"><?php the_sub_field('title'); ?></h2>   
                    <div class="header-link align-middle"><?php the_sub_field('text'); ?></div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php function the_stats() { ?>
    <div class="container strip stats">
        <div class="row">
            <div class="col-4 col-lg-2 offset-lg-3 item">
                <div>Более</div>
                <h2><?php the_sub_field('paintings'); ?></h2>
                <div>картин</div>
            </div>
            <div class="col-4 col-lg-2 item">
                <div>Более</div>
                <h2><?php the_sub_field('private_galleries'); ?></h2>
                <div>картин находятся в частных коллекциях</div>
            </div>
            <div class="col-4 col-lg-2 item">
                <div>Более</div>
                <h2><?php the_sub_field('exhibitions'); ?></h2>
                <div>выставок</div>
            </div>
        </div>
    </div>
<?php } ?>

<?php function the_gallery() {
    $images = get_sub_field('gallery');
    $size = 'full'; // (thumbnail, medium, large, full or custom size)
    if( $images ) { ?>
        <div class="container strip gallery">
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
<?php } ?>



<?php
    the_post();

    if( have_rows('row') ):
        while ( have_rows('row') ) : the_row();
            if( get_row_layout() == 'hero' ):
                the_header();
            elseif( get_row_layout() == 'quote' ): 
                the_quote();
            elseif( get_row_layout() == 'text_and_image' ): 
                the_text_and_image();
            elseif( get_row_layout() == 'text' ): 
                the_text();
            elseif( get_row_layout() == 'slider' ): 
                the_gallery();
            elseif( get_row_layout() == 'stats' ): 
                the_stats();
            elseif( get_row_layout() == 'image' ): 
                the_image();
            endif;
        endwhile;
    endif;

?>







<?php get_footer(); ?>
