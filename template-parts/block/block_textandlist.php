<?php
/*
Block Name: Text and List
Block Description: Text and List side by side
Post Types: post, page, custom-type
Block SVG: block_template.svg
Block Category: s9blocks
*/
$sectionclass = 'textandlist';
/* --------------------------------------------------------------------------- */
if( !empty( $block['data']['_is_preview'] ) ) {
		echo' <img src="'.get_stylesheet_directory_uri().'/template-parts/previews/block_template.png" alt="Title Field">';
		return;
} 
/* --------------------------------------------------------------------------- */
include('______partials_global.php');

$orderfield = ! empty( get_field('orderfield') ) ? get_field('orderfield') : 'imagetext';


$text_information = ! empty( get_field('text_information') ) ? '<div class="wcp-column txtintro"><h1>'.get_field('text_information').'</h1></div>' : '<div class="wcp-column txtintro"></div>';

$text_list = ! empty( get_field('text_list') ) ? '<div class="wcp-column txtlist">'.get_field('text_list').'</div>' : '<div class="wcp-column txtlist"></div>';



if ($orderfield === 'textandlist') {
	$display = $text_list.$text_information;
 } else {
	 $display = $text_information.$text_list;
 }

echo '<section '.$anchor.' class="'.$blockclass .'">
	<div class="wcp-columns">
	 	'.$display.'
	</div>
</section>';
?>
