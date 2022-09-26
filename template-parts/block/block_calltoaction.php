<?php
/*
Block Name: Call to action
Block Description: Call to action
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


$calltext = ! empty( get_field('text_information') ) ? '<p>'.get_field('text_information').'</p>' : '';
// Creates a Link from a ACF field array
if( !empty($linkfield = get_field('link_field')) ) {
	$linkurl=$linktitle=$linkdisplaytitle=$linktarget=$link=$linkclass = '';
	$linkurl = ! empty( $linkfield['url'] ) ? $linkfield['url'] : '#';
	$linktitle = ! empty( $linkfield['title'] ) ? ' title="'.$linkfield['title'].'"' : '';
	$linkdisplaytitle = ! empty( $linkfield['title'] ) ? $linkfield['title'] : 'Find out more';
	$linktarget = ! empty( $linkfield['target'] ) ? ' target="'.$linkfield['target'].'"' : '';
	$link1 = '<a href="'.$linkurl.'"'.$linktitle.$linktarget.'>'.$linkfield['title'].'</a>';
} else  {
	$link1 = '';
};

/* --------------------------------------------------------------------------- */
echo '<section '.$anchor.' class="'.$blockclass .'">
	<div class="wcp-columns">
	 	<div class="wcp-column full">
		 '.$calltext.$link1.'
		 </div>
	</div>
</section>';
?>
