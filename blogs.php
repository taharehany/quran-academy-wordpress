<?php /* Template Name:blogs */ ?>

<?php get_header(); ?>

<!-- Blogs -->
<section class="blogs">
	<div class="container">
		<div class="main-title">
			<h2>المدونة</h2>
		</div>

		<div class="row">
			<?php
			// Get the current page
			$paged = get_query_var('paged') ? get_query_var('paged') : 1;

			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 12,
				'paged' => $paged, // Include the paged parameter for pagination
			);

			$blogs = new WP_Query($args);

			if ($blogs->have_posts()) :
				while ($blogs->have_posts()) : $blogs->the_post();
					$thumbnail_url = get_the_post_thumbnail_url();
			?>
			<div class="col-md-6 col-lg-4 col-12">
				<div class="single-blog">
					<a href="<?php the_permalink(); ?>">
						<img src="<?php echo esc_html($thumbnail_url); ?>" class="img-fluid" alt="">
					</a>

					<div class="text">
						<a href="<?php the_permalink(); ?>">
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
			else:
			?>
				<p>لا توجد مقالات حاليًا.</p>
			<?php
			endif;
			?>
		</div>

		<div class="pagination">
			<?php
			// Display pagination
			echo paginate_links(array(
				'total' => $blogs->max_num_pages,
				'current' => $paged,
				'format' => '?paged=%#%',
				'prev_text' => __('السابق'),
				'next_text' => __('التالي'),
			));
			?>
		</div>
	</div>
</section>
<!-- Blogs -->

<?php get_footer(); ?>
