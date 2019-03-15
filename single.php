<?php
/**
 * Template Name: Post
 *
 * The template for displaying any single post.
 *
 */

get_header(); // This fxn gets the header.php file and renders it ?>

	<div id="content" class="eats-wrapper" role="main">
			<?php if ( have_posts() ) :
			// Do we have any posts in the databse that match our query?
			?>

				<?php while ( have_posts() ) : the_post();
				$more = 0;
				// If we have a post to show, start a loop that will display it
				?>

				<article class="eats-post <? if (get_field('image')):?>eats-post--two-col<?php endif;?>">

						<?php if (get_field('image')) : ?>

							<img
								class="eats-post-image"
								src="<?php echo get_field('image') ?>"
								alt="<?php the_title(); ?>"
							/>

						<?php endif; ?>

            <div class="eats-post-content">

              <time class="eats-post-date" datetime=<?php the_time('F d,Y') ?>}>
                <?php the_time('F d, Y'); // Display the time it was published ?>
              </time>

              <a class="eats-post-link" href="<?php the_permalink();?>">
                <h1 class="eats-post-title"><?php the_title(); // Display the title of the post ?></h1>
               </a>

							<div class="the-content">
								<?php the_content(); ?>

								<?php wp_link_pages(); // This will display pagination links, if applicable to the post ?>
						</div>
			    </div><!-- the-content -->

        </article>

				<?php endwhile; // OK, let's stop the post loop once we've displayed it ?>

				<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>

			<?php endif; // OK, I think that takes care of both scenarios (having a post or not having a post to show) ?>

		</div><!-- #content .site-content -->

<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
