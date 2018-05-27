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

<?php
    function the_header() {
        ?>
<div class="container">
    <div class="row">
        <div class="header col-12" style="background-image: url('<?php the_sub_field('background');?>')">
            <div class="text-center">
                <h2 class="header-text"><?php the_sub_field('title'); ?></h2>
                <h3 class="header-link"><?php the_sub_field('link'); ?></h3>    
            </div>
        </div>
    </div>  
</div>
        <?php
    }
?>



<?php
    function the_quote() {
        ?>
<h3 class="text-center quote"><?php the_sub_field('quote'); ?></h3>
<h3 class="text-center quote-link"><?php the_sub_field('link'); ?></h3>
        <?php
    }
?>


<?php
    function the_text_and_image() {
        ?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <img class="img-fluid" src="<?php the_sub_field('image'); ?>" alt=""/>
        </div>
        <div class="col-6">
            <h3 class="header-link"><?php the_sub_field('text'); ?></h3>    
        </div>
    </div>
</div>
        <?php
    }
?>






<?php the_post() ?>


<?php
    if( have_rows('row') ):
        while ( have_rows('row') ) : the_row();
            if( get_row_layout() == 'hero' ):
                the_header();
            elseif( get_row_layout() == 'quote' ): 
                the_quote();
            elseif( get_row_layout() == 'text_and_image' ): 
                the_text_and_image();
            endif;
        endwhile;
    endif;

?>







<?php get_footer(); ?>
