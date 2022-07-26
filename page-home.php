<?php get_header(); ?>
<div class="content-area">
	<main>
		<section class="slide">
			<div class="container">
				<div class="row">
					<?php
					echo do_shortcode('[smartslider3 slider="2"]');
					?>
				</div>
			</div>
		</section>
		<section class="services">
			<div class="container">
				<h1>Our Services</h1>
				<div class="row">
					<div class="col-sm-4">
						<div class="services-item">

							<?php
							if (is_active_sidebar('services-1')) {
								dynamic_sidebar('services-1');
							}
							?>

						</div>
					</div>
					<div class="col-sm-4">
						<div class="services-item">

							<?php
							if (is_active_sidebar('services-2')) {
								dynamic_sidebar('services-2');
							}
							?>

						</div>
					</div>
					<div class="col-sm-4">
						<div class="services-item">

							<?php
							if (is_active_sidebar('services-3')) {
								dynamic_sidebar('services-3');
							}
							?>

						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="middle-area">
			<div class="container">
				<div class="row">
					<aside class="sidebar col-md-3 h-100">

						<?php

						// Require a file called sidebar-home.php
						get_sidebar('home');

						?>

					</aside>
					<div class="news col-md-9">
						<div class="container">
							<div class="row">
								<?php

								// First Loop
								$featured = new WP_Query('post_type=post&posts_per_page=1&cat=4,11');

								if ($featured->have_posts()) :
									while ($featured->have_posts()) :
										$featured->the_post();
								?>

										<div class="col-12">
											<?php get_template_part('template-parts/content', 'featured'); ?>
										</div>

									<?php
									endwhile;
									wp_reset_postdata();
								endif;

								// Second Loop
								$args = array(
									'post_type' => 'post',
									'posts_per_page' => 2,
									'category__not_in' => array(7),
									'category__in' => array(4, 5),
									'offset' => 1
								);

								$secondary = new WP_Query($args);

								if ($secondary->have_posts()) :
									while ($secondary->have_posts()) :
										$secondary->the_post();
									?>

										<div class="col-sm-6">
											<?php get_template_part('template-parts/content', 'secondary'); ?>
										</div>

								<?php
									endwhile;
									wp_reset_postdata();
								endif;


								?>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
		<section class="map">
				<iframe 
				src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2934.713990398592!2d21.1530283157546!3d42.64622292497366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549e8d5d607f25%3A0xa31dd05b21bd09de!2sUBT%20College!5e0!3m2!1sen!2s!4v1658833012130!5m2!1sen!2s" 
				width="100%" 
				height="350" 
				style="border:0;" 
				allowfullscreen="" 
				loading="lazy" 
				referrerpolicy="no-referrer-when-downgrade">
			</iframe>
		</section>
	</main>
</div>
<?php get_footer(); ?>