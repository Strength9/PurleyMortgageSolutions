<?php
/*
Block Name: Quotations
Block Description: Quotations
Post Types: post, page, custom-type
Block SVG: block_template.svg
Block Category: s9blocks
*/
$sectionclass = 'quotesarea';
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
			$quotes.= '<div class="quotebox">'.$quote_text.'<div class="qby">'.$quote_by.'</div></div>' ;
	endwhile; 
endif;



/* --------------------------------------------------------------------------- */
echo '<section '.$anchor.' class="'.$blockclass .'">
	<div class="wcp-columns">
	 	<div class="wcp-column full"><h1>'.$quote_section_title.'</h1><div class="quotations">'.$quotes.'</div></div>
	</div>
</section>';
?>
