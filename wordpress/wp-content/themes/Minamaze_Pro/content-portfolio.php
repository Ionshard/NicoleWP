<?php
/**
 * The Portfolio item content template file.
 *
 * @package ThinkUpThemes
 */
?>


		<article class="project-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'minamaze' ), 'after' => '</div>' ) ); ?>
		</article>

		<article class="project-information">
			<?php thinkup_input_projectinfo(); ?>
		</article>