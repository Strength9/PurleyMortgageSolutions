<?php
/*
Block Name: Square Links
Block Description: Square Links
Post Types: post, page, custom-type
Block SVG: block_template.svg
Block Category: s9blocks
*/
$sectionclass = 'squarelinks';
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



$section_title = ! empty( get_field('section_title') ) ? '<h1>'.get_field('section_title').'</h1>' : '';
$section_intro = ! empty( get_field('section_intro') ) ? get_field('section_intro') : '';

$linkexit = $linkrepeat = '';
if( get_field('link_area') ):
	while( the_repeater_field('link_area') ):
		
		$imagerp = '';
		$glob_imageclass = 'centicon';
		if( !empty($imagefield = get_sub_field('image_repeater')) ) {
			$imageurl=$imagealt=$imageclass = '';
			$imageclass = ' class="'.$glob_imageclass.'"'; //''; //
			$imageurl = ! empty($imagefield['url'] ) ? $imagefield['url'] : get_field('default_holding_image','options');
			$imagealt = ! empty( $imagefield['alt'] ) ? ' alt="'.$imagefield['alt'].'"' : '';
			$imagerp = '<div class="image" style="background-image:url('.$imageurl.');"></div>';
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
			$linkrepeat.= '<div class="squarelink">'.$imagerp.$text_repeater.$linkoutput.'</div>' ;
	endwhile; 
	
		$linkexit = '<div class="squarelinkbox">'.$linkrepeat.'</div>';
endif;






/* --------------------------------------------------------------------------- */
echo '<section '.$anchor.' class="'.$blockclass .'">
	<div class="wcp-columns">
		 <div class="wcp-column full"><div class="intro">'.$section_title.$section_intro.'</div>'.$linkexit.'</div>
	</div>
</section>';
?>

