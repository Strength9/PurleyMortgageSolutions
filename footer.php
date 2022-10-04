<?php 

$footcallbackgroundcolor = ! empty( get_field('background-color','options') ) ? get_field('background-color','options') : '';
$calltext = ! empty( get_field('call_to_action_text','options') ) ? '<p>'.get_field('call_to_action_text','options').'</p>' : '';
// Creates a Link from a ACF field array
if( !empty($linkfield = get_field('call_to_action_link','options')) ) {
	$linkurl=$linktitle=$linkdisplaytitle=$linktarget=$link=$linkclass = '';
	$linkurl = ! empty( $linkfield['url'] ) ? $linkfield['url'] : '#';
	$linktitle = ! empty( $linkfield['title'] ) ? ' title="'.$linkfield['title'].'"' : '';
	$linkdisplaytitle = ! empty( $linkfield['title'] ) ? $linkfield['title'] : 'Find out more';
	$linktarget = ! empty( $linkfield['target'] ) ? ' target="'.$linkfield['target'].'"' : '';
	$calltoaction = '<a href="'.$linkurl.'" class="button" '.$linktitle.$linktarget.'>'.$linkfield['title'].'</a>';
} else  {
	$calltoaction= '';
};

$legal_title = ! empty( get_field('legal_title','options') ) ? get_field('legal_title','options') : '';
$legal_text = ! empty( get_field('legal_text','options') ) ? get_field('legal_text','options') : '';



$glob_imageclass = 'centicon';
if( !empty($imagefield = get_field('logo','options')) ) {
	$imageurl=$imagealt=$imageclass = '';
	$imageclass = ' class="'.$glob_imageclass.'"'; //''; //
	$imageurl = ! empty($imagefield['url'] ) ? $imagefield['url'] : get_field('default_holding_image','options');
	$imagealt = ! empty( $imagefield['alt'] ) ? ' alt="'.$imagefield['alt'].'"' : '';
	$logofoot = '<img src="'.$imageurl.'"'.$imagealt.$imageclass.'/>';
} else  { 
	$logofoot = '';
};


$facebook = ! empty( get_field('facebook','options') ) ? '<li><a href="'.get_field('facebook','options').'" title=""><i class="fa-brands fa-facebook-f"></i></a></li>' : '';
$twitter = ! empty( get_field('twitter','options') ) ? '<li><a href="'.get_field('twitter','options').'" title=""><i class="fa-brands fa-twitter"></i></a></li>' : '';
$linkedin= ! empty( get_field('linkedin','options') ) ? '<li><a href="'.get_field('linkedin','options').'" title=""><i class="fa-brands fa-linkedin-in"></i></a></li>' : '';
$instagram = ! empty( get_field('instagram','options') ) ? '<li><a href="'.get_field('instagram','options').'" title=""><i class="fa-brands fa-instagram"></i></a></li>' : '';

/* --------------------------------------------------------------------------- */
echo '<section class="thelegalstuff"><div class="wcp-columns"><div class="wcp-column full"><h1>'.$legal_title .'</h1>'.$legal_text.'</div></div></section>
<section class="calltoaction '.$footcallbackgroundcolor.'">
	<div class="wcp-columns"><div class="wcp-column full">'.$calltext.$calltoaction.'</div>
	</div></section>';?>
<footer>
	<div class="wcp-columns">
		 <div class="wcp-column logofield">
		<?php echo $logofoot;?>
		 </div>
		 <div class="wcp-column">
		 <?php wp_nav_menu( array(  'menu' => 'Footer1','container'  => '', 'container_class' => '', 'container_id'    => '',   'depth' => 1, 'items_wrap' => '<ul>%3$s</ul>' ) );?>
		  </div>
		  <div class="wcp-column">
		  <?php wp_nav_menu( array(  'menu' => 'Footer2','container'  => '', 'container_class' => '', 'container_id'    => '',   'depth' => 1, 'items_wrap' => '<ul >%3$s</ul>' ) );?>
		   </div>
	</div>
</footer>

<div class="copyright">
	<div class="bar">
		<ul class="copyrightlist">
			<li>Copyright <?php echo Date("Y");?>. All rights reserved.</li>
			<li>Site designed by NJGraphique</li>
		</ul>
		<ul class="socialmedia">
			<?php echo $facebook.$twitter.$linkedin.$instagram;?>
		</ul>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>

