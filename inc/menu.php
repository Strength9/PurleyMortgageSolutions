<?php

if( !empty($imagefield = get_field('logo_variation','options')) ) {
	$imageurl=$imagealt=$imageclass = '';
	$imageurl = ! empty($imagefield['url'] ) ? $imagefield['url'] : get_field('default_holding_image','options');
	$imagealt = ! empty( $imagefield['alt'] ) ? ' alt="'.$imagefield['alt'].'"' : '';
	$logohead = '<img src="'.$imageurl.'"'.$imagealt.$imageclass.'/>';
} else  { 
	$logohead ='';
};

$telephone_number = ! empty( get_field('telephone_number','options') ) ? '<a href="tel:'.get_field('telephone_number','options').'">'.get_field('telephone_number','options').'</a>' : '';
$email = ! empty( get_field('email_address','options') ) ? '<a href="mailto:'.get_field('email_address','options').'">'.get_field('email_address','options').'</a>' : '';

?>

<header class="head">
	
	  <div class="left">
		  <a href="<?php echo get_site_url(); ?>" title="Purley Mortgage Solutions"><?php echo $logohead;?></a>
	  </div>
	  <div class="right">
		 
		  	<div class="navigation">
	  			<ul class="contacts">
					<li>t: <?php echo $telephone_number;?></li>
					<li>e: <?php echo $email;?></li>
					
					<li class="ctousbutton">
						<a href="/contact-us/" class="buttontop">Check Availability</a></li>
					<li class="mobileonly"><label for="drop" class="toggle"><i class="fa-solid fa-bars"></i></label></li>
				</ul>
				<nav >
					<input type="checkbox" id="drop">
					<?php wp_nav_menu( array(  'menu' => 'MainNav','container'  => '', 'container_class' => '', 'container_id'    => '',   'depth' => 3 , 'items_wrap' => '<ul><li class="close"><label for="drop" class="toggle"><i class="fa-sharp fa-solid fa-xmark"></i></label></li>%3$s</ul>' ) );?>
				</nav>
		  </div>
	</div>
</header>