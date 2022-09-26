<?php
/*
Block Name: Quotations
Block Description: Quotations
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



$quote_section_title = ! empty( get_field('quote_section_title') ) ? get_field('quote_section_title') : 'Content';
$quotes = '';
if( get_field('quotations','options') ):
	while( the_repeater_field('quotations','options') ):
			
			$quote_by = ! empty( get_sub_field('quote_by') ) ? get_sub_field('quote_by') : '';
			$quote_text = ! empty( get_sub_field('quote_text') ) ? get_sub_field('quote_text') : '';
			$quotes.= $quote_text.$quote_by ;
	endwhile; 
endif;



/* --------------------------------------------------------------------------- */
echo '<section '.$anchor.' class="'.$blockclass .'">
	<div class="wcp-columns">
	 	<div class="wcp-column">'.$quote_section_title.'</div>
	 	<div class="wcp-column">'.$quotes .'</div>
	</div>
</section>';
?>
