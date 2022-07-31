<?php
/*
Block Name: Contact Block
Block Description: Contact Block
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

/* --------------------------------------------------------------------------- */
echo '<section '.$anchor.' class="'.$blockclass .'">
	<div class="wcp-columns">
	 	<div class="wcp-column"></div>
	 	<div class="wcp-column"></div>
	</div>
</section>';
?>
