<?php get_header();  ?>

<div id="primary">
	<div id="main">
		<div class="container">
			
			<h2>Search results for: <?php echo get_search_query(); ?></h2>

			<?php 

			get_search_form();

			while( have_posts() ):
				the_post();
				get_template_part( 'template-parts/content', 'search' );

				// Display a comment form if this post is open to comments
				if( comments_open() || get_comments_number() ):
					// Display the default comments form, or a custom form (type the custom filename inside the parenthesis).
					// Example: comments_template( 'filename.php' );
					comments_template();
				endif;

			endwhile;

			the_posts_pagination(array(
				'prev_text' => 'Previous',
				'next_text' => 'Next',
			));

			?>

		</div>
	</div>
</div>

<?php get_footer(); ?>