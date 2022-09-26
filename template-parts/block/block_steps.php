<?php
/*
Block Name: Support Steps
Block Description: Support Steps
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
/* --------------------------------------------------------------------------- 


*/
include('______partials_global.php');



$section_title = ! empty( get_field('section_title') ) ? get_field('section_title') : '';
$linkrepeat = '';
if( get_field('steps') ):
	while( the_repeater_field('steps') ):
		
			$imagerp = '';
		$glob_imageclass = 'centicon';
		if( !empty($imagefield = get_sub_field('image_repeater')) ) {
			$imageurl=$imagealt=$imageclass = '';
			$imageclass = ' class="'.$glob_imageclass.'"'; //''; //
			$imageurl = ! empty($imagefield['url'] ) ? $imagefield['url'] : get_field('default_holding_image','options');
			$imagealt = ! empty( $imagefield['alt'] ) ? ' alt="'.$imagefield['alt'].'"' : '';
			$imagerp = '<img src="'.$imageurl.'"'.$imagealt.$imageclass.'/>';
		} else  { 
			$imagerp= '';
		};
		

$background_colour= ! empty( get_sub_field('background_colour') ) ? get_sub_field('background_colour') : '';

		
$number_repeater= ! empty( get_sub_field('number_repeater') ) ? get_sub_field('number_repeater') : '';
			$text_repeater= ! empty( get_sub_field('text_repeater') ) ? get_sub_field('text_repeater') : '';
			$linkrepeat.= $number_repeater.$text_repeater.$background_colour.$imagerp ;
	endwhile; 
endif;






/* --------------------------------------------------------------------------- */
echo '<section '.$anchor.' class="'.$blockclass .'">
	<div class="wcp-columns">
		 <div class="wcp-column">'.$section_title.'</div>
		 <div class="wcp-column">'.$linkrepeat.'</div>
	</div>
</section>';
?>

