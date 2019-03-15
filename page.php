<?php
/**
 * 	Template Name: Page
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/

get_header();
?>

	<section id="primary" class="eats-wrapper">
		<main id="main" class="site-main">

    <?php while ( have_posts() ) : the_post(); 
				// If we have a page to show, start a loop that will display it
				?>

					<article class="eats-page">

						<?php if (!is_front_page()) : // Only if this page is NOT being used as a home page, display the title ?>
							<h1 class='eats-title'>
								<?php the_title(); // Display the page title ?>
							</h1>
						<?php endif; ?>
										
						<div class="eats-content the-content">
							<?php the_content(); 
							// This call the main content of the page, the stuff in the main text box while composing.
							// This will wrap everything in paragraph tags
							?>
							
							<?php wp_link_pages(); // This will display pagination links, if applicable to the page ?>
						</div><!-- the-content -->
						
					</article>

				<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php
get_footer();
