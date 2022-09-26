<?php
/*
Block Name: Image and Text side by side
Block Description: Image and Text side by side
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

$orderfield = ! empty( get_field('orderfield') ) ? get_field('orderfield') : 'imagetext';

$glob_imageclass = 'centicon';
if( !empty($imagefield = get_field('image_field')) ) {
	$imageurl=$imagealt=$imageclass = '';
	$imageclass = ' class="'.$glob_imageclass.'"'; //''; //
	$imageurl = ! empty($imagefield['url'] ) ? $imagefield['url'] : get_field('default_holding_image','options');
	$imagealt = ! empty( $imagefield['alt'] ) ? ' alt="'.$imagefield['alt'].'"' : '';
	$image_output = '<div class="wcp-column"><img src="'.$imageurl.'"'.$imagealt.$imageclass.'/></div>';
} else  { 
	$image_output = '<div class="wcp-column"></div>';
};

$text_information = ! empty( get_field('text_information') ) ? '<div class="wcp-column">'.get_field('text_information').'</div>' : '<div class="wcp-column"></div>';

if ($orderfield === 'imagetext') {
	$display = $image_output.$text_information;
 } else {
	 $display = $text_information.$image_output;
 }

echo '<section '.$anchor.' class="'.$blockclass .'">
	<div class="wcp-columns">
	 	'.$display.'
	</div>
</section>';
?>
