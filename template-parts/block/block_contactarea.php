<?php
/*
Block Name: Contact Area
Block Description: Contact Block
Post Types: post, page, custom-type
Block SVG: block_template.svg
Block Category: s9blocks
*/
$sectionclass = 'contactblock';
/* --------------------------------------------------------------------------- */
if( !empty( $block['data']['_is_preview'] ) ) {
		echo' <img src="'.get_stylesheet_directory_uri().'/template-parts/previews/block_template.png" alt="Title Field">';
		return;
} 
/* --------------------------------------------------------------------------- */
include('______partials_global.php');

$background_image = ! empty( get_field('background_image') ) ? get_field('background_image') : '';
$title_text = ! empty( get_field('title_text') ) ? '<h1>'.get_field('title_text').'</h1>' : '';

$telephone_number = ! empty( get_field('telephone_number','options') ) ? '<a href="tel:'.get_field('telephone_number','options').'">'.get_field('telephone_number','options').'</a>' : '';
$email = ! empty( get_field('email_address','options') ) ? '<a href="mailto:'.get_field('email_address','options').'">'.get_field('email_address','options').'</a>' : '';

/* --------------------------------------------------------------------------- */
echo '
<section class="herohead small">
		<div class="heroimage" style="background-image:url('.$background_image.');">'.$title_text.'</div>
</section>

<section class="'.$blockclass .'">
	<div class="wcp-columns">
		 <div class="wcp-column full">
		
			 <div class="contact">
				 <div class="details">
				 <div class="intro">
					 <p>For all mortgage advice in Croydon
					 and surrounding areas, contact us for
					 a chat about your personal situation
					 to see how we can help you.</p>
					 
				</div>
		 
						 <address>
						 Head Office, Croydon<br>
							 Airport House, Purley Way,<br>
							 Croydon  CR0 0XY<br><br>
							 Tel: '.$telephone_number.'<br>
							 Email: '.$email.'
						 </address>
				 </div>
				 <div class="formgrid">'.do_shortcode('[wpforms id="353"]').' </div>
			 </div>
		 </div>
	</div>
	<div class="mapouter"><div class="gmap_canvas"> <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=Airport House%20Purley Way%20Croydon%20CR0 0XY&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div></div>
</section>';
?>


