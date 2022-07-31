<?php get_header(); ?>
	<main>

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post();  ?>

					<?php the_content(); ?>

				<?php endwhile; ?>


			<?php else :  ?>
				
				<article class="post error">
					<h1 class="404">Nothing has been posted like that yet</h1>
				</article>

			<?php endif;  ?>

<main>
<?php get_footer();  ?>