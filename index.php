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
  the_post();

  if( have_rows('row') ):
    while ( have_rows('row') ){
      the_row();
      get_template_part( 'rows/'.get_row_layout());
    }
  endif;
?>







<?php get_footer(); ?>
