<?php get_header(); ?>
<?php
function StoreSearchterm($searchterm) {
	global $wpdb;
		
		$value = $searchterm;
		$sql = $wpdb->prepare( "
		
			INSERT INTO {$wpdb->prefix}posts` (
			
				`post_author`,
				`post_date`,
				`post_date_gmt`,
				`post_content`,
				`post_title`,
				`post_excerpt`,
				`post_status`,
				`comment_status`,
				`ping_status`,
				`post_password`,
				`post_name`,
				`to_ping`,
				`pinged`,
				`post_modified`,
				`post_modified_gmt`,
				`post_content_filtered`,
				`post_parent`,
				`guid`,
				`menu_order`,
				`post_type`,
				`post_mime_type`,
				`comment_count` 
			)
			VALUES
				(
			
					0,
					CURRENT_TIMESTAMP,
					CURRENT_TIMESTAMP,
				%s,
				'Store Search Data',
				'',
				'publish',
				'closed',
				'closed',
				'',
				'Search-Store-Result',
				'',
				'',
				CURRENT_TIMESTAMP,
				CURRENT_TIMESTAMP,
				'',
				00,
				'--',
				0,
				'search_data',
				'',
			0 
			);", $value);
		
		//SELECT * FROM {$wpdb->prefix}some_table WHERE some_column = %s", $value );
		$data =  $wpdb->get_results( $sql );
		
	
		
		return 'Dave';
		
	};
	?>
<main>
	
<h1>Search Results</h1>

</section>
			
			
				<?php
							
							StoreSearchterm($_GET["s"]);
							
							
							$s = get_search_query();
							$args = array( 's' =>$s );
								// The Query
							$the_query = new WP_Query( $args );
							if ( $the_query->have_posts() ) { 
										
								echo '<section class="searchresults">
								
								<div class="wcp-columns">
									 <div class="wcp-column t_c">
									 
									 <h1 class="titletext green">Search Results</h1>
									 
									 <form action="/" method="get" id="searchform" class="innersearch">
										 <input type="text" id="s" name="s" placeholder="Search..." value="'.$_GET['s'].'">
										 <input type="submit" value="Search" />
									 </form>
									 
									 </div>
									<div class="wcp-column">
										<ul class="res">
									';
												
											$SR = '';
										while ( $the_query->have_posts() ) {


									   					$the_query->the_post();
														$id = get_the_ID();
									   					$linkurl = esc_url(get_permalink());
									   					$linktitle  = get_the_title();
														$featured_img_url = get_the_post_thumbnail_url($id,'full');				   					
									  				
										  					$urlarray =  get_field('page_image');
										 			
													 	$SR .= 'array('.$linktitle.','.$id.'),';
													 
															
									  				echo  '<li> <a href="'.$linkurl.'" title="'.$linktitle.'" target="_new">
																'.$linktitle.'</a></li>';
														}
										echo '</ul>
										</div></div>
										</section>';
										
										;
									
						}else{
							?>

										
									<section >
										<div class="wcp-columns">
										  <div class="wcp-column">
												<h1><span class="sub-heading">404</span>Page Not Found</h1>
												<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
										  </div>
										  <div class="wcp-column">
									
									<form action="/" method="get" id="searchform" class="innersearch">
										<input type="text" id="s" name="s" placeholder="Search...">
										<input type="submit" value="Search" />
									</form>
									
									
										</div> 
									</section>
							<?php } ?>

</main>

<?php get_footer();  ?>