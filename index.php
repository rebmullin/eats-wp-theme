<?php
/**
 * The template for displaying the home/index page.
 * This template will also be called in any case where the Wordpress engine
 * doesn't know which template to use (e.g. 404 error)
 */

get_header(); // This fxn gets the header.php file and renders it ?>
	<div id="content" class="eats-wrapper" role="main">

			<?php if ( have_posts() ) :
			// Do we have any posts in the databse that match our query?
			// In the case of the home page, this will call for the most recent posts
			?>

				<?php while ( have_posts() ) : the_post();
          // If we have some posts to show, start a loop that will display each one the same way
          ?>

          <article class="eats-post <? if (get_field('image')):?>eats-post--two-col<?php endif;?>">

          <?php if (get_field('image')) : ?>

            <img
                class="eats-post-image"
                src="<?php echo get_field('image') ?>"
                alt="<?php the_title()?>"
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
              <?php the_excerpt(); ?>
              <a href="<?php the_permalink();?>" class="eats-post-read-more eats-post-link">
                Read More
              <i class="eats-post-read-more-icon icon-cheveron-right"></i>
            </a>

              <?php wp_link_pages(); // This will display pagination links, if applicable to the post ?>
            </div>
          </div><!-- the-content -->

        </article>

			<?php endwhile; // OK, let's stop the posts loop once we've exhausted our query/number of posts ?>

			<!-- pagintation -->
			<div id="pagination" class="eats-posts-pagination clearfix">
				<div class="past-page"><?php previous_posts_link( 'newer' ); // Display a link to  newer posts, if there are any, with the text 'newer' ?></div>
				<div class="next-page"><?php next_posts_link( 'older' ); // Display a link to  older posts, if there are any, with the text 'older' ?></div>
			</div><!-- pagination -->


			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>

				<article class="eats-post post error">
					<h1 class="404">Nothing has been posted like that yet</h1>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having posts or not having any posts) ?>
		</div><!-- #content .eats-wrapper -->

<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
