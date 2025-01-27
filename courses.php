<?php /* Template Name:courses */ ?>

<?php get_header(); ?>

<!-- Blogs -->
<section class="blogs">
	<div class="container">
		<div class="main-title">
			<h2><?php the_title(); ?></h2>
		</div>

		<div class="row">
			<?php
			$args = array(
				'post_type' => 'courses',
				'posts_per_page' => 6,
			);

			$courses = new wp_query($args);

			if ($courses->have_posts()) :
				while ($courses->have_posts()) : $courses->the_post();
					$thumbnail_url = get_the_post_thumbnail_url();
			?>
			<div class="col-md-6 col-lg-4 col-12">
				<div class="single-blog">
					<a href="<?php the_permalink() ?>">
						<img src="<?php echo esc_html($thumbnail_url); ?>" class="img-fluid" alt="">
					</a>

					<div class="text">
						<a href="<?php the_permalink() ?>">
							<h3>
								<?php the_title(); ?>
							</h3>
						</a>

						<div class="desc">
							<?php the_excerpt(); ?>
						</div>
					</div>
				</div>
			</div>
			<?php
				endwhile;
				wp_reset_postdata();
			endif;

			previous_posts_link('السابق');
			next_posts_link('التالي');
			?>
		</div>
	</div>
</section>
<!-- Blogs -->

<?php get_footer(); ?>

