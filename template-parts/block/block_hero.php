<?php
/*
Block Name: Hero Header
Block Description: Hero Header
Post Types: post, page, custom-type
Block SVG: block_template.svg
Block Category: s9blocks
*/
$sectionclass = 'cblock';
/* --------------------------------------------------------------------------- */
if( !empty( $block['data']['_is_preview'] ) ) {
		echo' <img src="'.get_stylesheet_directory_uri().'/template-parts/previews/block_template.png" alt="Title Field">';
		return;
} 
/* --------------------------------------------------------------------------- */
include('______partials_global.php');

$title_text = ! empty( get_field('title_text') ) ? get_field('title_text') : '';
$introduction_text = ! empty( get_field('introduction_text') ) ? get_field('introduction_text') : '';

$background_image = ! empty( get_field('background_image') ) ? get_field('background_image') : '';


/* --------------------------------------------------------------------------- */
echo '<section '.$anchor.' class="'.$blockclass .'">
	<div class="wcp-columns">
	 	<div class="wcp-column full">
		 '.$title_text.$introduction_text.$background_image.'</div>
	</div>
</section>';
?>
