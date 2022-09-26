<?php
/*
Block Name: Square Links
Block Description: Square Links
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

image_repeater
text_repeater
link_repeater

*/
include('______partials_global.php');



$section_title = ! empty( get_field('section_title') ) ? get_field('section_title') : '';
$section_intro = ! empty( get_field('section_intro') ) ? get_field('section_intro') : '';

$linkrepeat = '';
if( get_field('link_area') ):
	while( the_repeater_field('link_area') ):
		
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
		
		$linkoutput = '';
		if( !empty($linkfield = get_sub_field('link_repeater')) ) {
			$linkurl=$linktitle=$linkdisplaytitle=$linktarget=$link=$linkclass = '';
				$linkurl = ! empty( $linkfield['url'] ) ? $linkfield['url'] : '#';
				$linktitle = ! empty( $linkfield['title'] ) ? ' title="'.$linkfield['title'].'"' : '';
				$linkdisplaytitle = ! empty( $linkfield['title'] ) ? $linkfield['title'] : 'Find out more';
				$linktarget = ! empty( $linkfield['target'] ) ? ' target="'.$linkfield['target'].'"' : '';
				$linkoutput = '<a href="'.$linkurl.'"'.$linktitle.$linktarget.'>'.$linkfield['title'].'</a>';
			} else  {
				$linkoutput = '';
			};

			$text_repeater= ! empty( get_sub_field('text_repeater') ) ? get_sub_field('text_repeater') : '';
			$linkrepeat.= $imagerp.$text_repeater.$linkoutput ;
	endwhile; 
endif;






/* --------------------------------------------------------------------------- */
echo '<section '.$anchor.' class="'.$blockclass .'">
	<div class="wcp-columns">
		 <div class="wcp-column">'.$section_title.$section_intro.'</div>
		 <div class="wcp-column">'.$linkrepeat.'</div>
	</div>
</section>';
?>

