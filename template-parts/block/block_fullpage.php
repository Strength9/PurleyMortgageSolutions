<?php
/*
Block Name: Full Page Text
Block Description: Full Page Text
Post Types: post, page, custom-type
Block SVG: block_template.svg
Block Category: s9blocks
*/
$sectionclass = 'fptblock';
/* --------------------------------------------------------------------------- */
if( !empty( $block['data']['_is_preview'] ) ) {
		echo' <img src="'.get_stylesheet_directory_uri().'/template-parts/previews/block_template.png" alt="Title Field">';
		return;
} 
/* --------------------------------------------------------------------------- */
include('______partials_global.php');

$fullpage = ! empty( get_field('fullpage') ) ? get_field('fullpage') : '';

/* --------------------------------------------------------------------------- */
echo '<section '.$anchor.' class="'.$blockclass .'">
	<div class="wcp-columns">
		 <div class="wcp-column full">'.$fullpage.'</div>
	</div>
</section>';
?>
