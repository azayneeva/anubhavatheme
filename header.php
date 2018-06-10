<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,600,700" rel="stylesheet">

<?php wp_head(); ?>
<script src="https://unpkg.com/bricks.js/dist/bricks.js"></script>

</head>

<body <?php body_class(); ?>>

<div class="container header mt-3 mb-3">
	<div class="d-flex justify-content-between">
		<a id="menu-opener" href="#">
			<?xml version="1.0" encoding="UTF-8"?>
			<svg width="24px" height="22px" viewBox="0 0 24 22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			    <defs></defs>
			    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			        <g id="burger" fill="#7E4191" stroke="#78428E">
			            <rect id="Rectangle" x="0.5" y="0.5" width="23" height="1"></rect>
			            <rect id="Rectangle" x="0.5" y="10.5" width="15" height="1"></rect>
			            <rect id="Rectangle" x="0.5" y="20.5" width="17" height="1"></rect>
			        </g>
			    </g>
			</svg>
			<span>Меню</span>
		</a>
		<div>
            <?php 
                $image = get_field('footer_logo', 'option');
                $size = 'full'; // (thumbnail, medium, large, full or custom size)

                if( $image ) {
                    echo wp_get_attachment_image( $image, $size, "",array( "class" => "logo img-fluid" ) );
                }

            ?>
		</div>
		<div>
			<a href="phone:<?php the_field('phone_number', 'option'); ?>">
				<?php the_field('phone_number', 'option'); ?>
			</a>
		</div>
	</div>
</div>

<script>
	document.getElementById('menu-opener').addEventListener('click', function(e){
		e.preventDefault()
		document.getElementById('menu-overlay').classList.remove("hidden")
	})
</script>