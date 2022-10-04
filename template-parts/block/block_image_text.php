<?php
/*
Block Name: Image and Text side by side
Block Description: Image and Text side by side
Post Types: post, page, custom-type
Block SVG: block_template.svg
Block Category: s9blocks
*/
$sectionclass = 'textandimage';
/* --------------------------------------------------------------------------- */
if( !empty( $block['data']['_is_preview'] ) ) {
		echo' <img src="'.get_stylesheet_directory_uri().'/template-parts/previews/block_template.png" alt="Title Field">';
		return;
} 
/* --------------------------------------------------------------------------- */
include('______partials_global.php');


$bg  = ! empty( get_field('background_colour') ) ? get_field('background_colour') : 'white';
$orderfield = ! empty( get_field('orderfield') ) ? get_field('orderfield') : 'imagetext';

$glob_imageclass = 'centicon';
if( !empty($imagefield = get_field('image_field')) ) {
	$imageurl=$imagealt=$imageclass = '';
	$imageclass = ' class="'.$glob_imageclass.'"'; //''; //
	$imageurl = ! empty($imagefield['url'] ) ? $imagefield['url'] : get_field('default_holding_image','options');
	$imagealt = ! empty( $imagefield['alt'] ) ? ' alt="'.$imagefield['alt'].'"' : '';
	$image_output = '<div class="wcp-column wimage"><img src="'.$imageurl.'"'.$imagealt.$imageclass.'/></div>';
} else  { 
	$image_output = '<div class="wcp-column wimage"></div>';
};

$text_information = ! empty( get_field('text_information') ) ? '<div class="wcp-column wtext">'.get_field('text_information').'</div>' : '<div class="wcp-column wtext"></div>';

if ($orderfield === 'imagetext') {
	$blockclass .= ' imtxt';
	$display = $image_output.$text_information;
 } else {
	 $blockclass .= ' txtim';
	 $display = $text_information.$image_output;
 }

echo '<section '.$anchor.' class="'.$blockclass .' '.$bg.'">
	<div class="wcp-columns">
	 	'.$display.'
	</div>
</section>';
?>
