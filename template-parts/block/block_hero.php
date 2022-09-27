<?php
/*
Block Name: Hero Header
Block Description: Hero Header
Post Types: post, page, custom-type
Block SVG: block_template.svg
Block Category: s9blocks
*/
$sectionclass = 'herohead';
/* --------------------------------------------------------------------------- */
if( !empty( $block['data']['_is_preview'] ) ) {
		echo' <img src="'.get_stylesheet_directory_uri().'/template-parts/previews/block_template.png" alt="Title Field">';
		return;
} 
/* --------------------------------------------------------------------------- */
include('______partials_global.php');

$title_text = ! empty( get_field('title_text') ) ? '<h1>'.get_field('title_text').'</h1>' : '';
$introduction_text = ! empty( get_field('introduction_text') ) ? get_field('introduction_text') : '';

$background_image = ! empty( get_field('background_image') ) ? get_field('background_image') : '';

$glob_imageclass = 'centicon';
if( !empty($imagefield= get_field('image_field')) ) {
	$imageurl=$imagealt=$imageclass = '';
	$imageclass = ' class="'.$glob_imageclass.'"'; //''; //
	$imageurl = ! empty($imagefield['url'] ) ? $imagefield['url'] : get_field('default_holding_image','options');
	$imagealt = ! empty( $imagefield['alt'] ) ? ' alt="'.$imagefield['alt'].'"' : '';
	$imagefd = '<div class="imagefooter" style="background-image:url('.$imageurl.');"></div>';
} else  { 
	$imagefd= '';
};

/* --------------------------------------------------------------------------- */
echo '<section '.$anchor.' class="'.$blockclass .'">
		<div class="heroimage" style="background-image:url('.$background_image.');">'.$title_text.'</div>
		 '.$introduction_text.$imagefd.'

</section>';
?>
