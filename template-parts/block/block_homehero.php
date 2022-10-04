<?php
/*
Block Name: Hero Home Header
Block Description: Hero Home Header
Post Types: post, page, custom-type
Block SVG: block_template.svg
Block Category: s9blocks
*/
$sectionclass = 'homeherohead'; 
/* --------------------------------------------------------------------------- */
if( !empty( $block['data']['_is_preview'] ) ) {
		echo' <img src="'.get_stylesheet_directory_uri().'/template-parts/previews/block_template.png" alt="Title Field">';
		return;
} 
/* --------------------------------------------------------------------------- */
include('______partials_global.php');



$background_image = ! empty( get_field('hero_image') ) ? get_field('hero_image') : '';

/* --------------------------------------------------------------------------- */
echo '<section '.$anchor.' class="'.$blockclass .'" style="background-image:url('.$background_image.');">
		<div class="heroimage" >
			<div class="straps">
				<h1>For better and stress<br>free living book a free<br>consultation today...</h1>
			</div>
			<div class="quickjumps">
				<ul class="list">
					<li><a href="/mortgages/" title="Mortgages">Mortgages</a></li>
					<li><a href="/protection/" title="Protection">Protection</a></li>
					<li><a href="/insurance/" title="Insurance">Insurance</a></li>
				</ul>
			</div>
		</div>
	

</section>';
?>
