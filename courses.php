<?php /* Template Name: courses */ ?>

<?php get_header(); ?>

<!-- Blogs -->
<section class="blogs">
	<div class="container">
		<div class="main-title">
			<h2><?php the_title(); ?></h2>
		</div>

		<div class="row">
			<?php
			// Set up the query arguments
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'post_type' => 'course-detail',
				'posts_per_page' => 12,
				'paged' => $paged, // Add pagination
			);

			// Create a new WP_Query
			$courses = new WP_Query($args);

			// Check if there are posts
			if ($courses->have_posts()) :
				// Loop through the posts
				while ($courses->have_posts()) : $courses->the_post();
					$thumbnail_url = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : 'default-image.jpg'; // Default fallback
					$course_permalink = get_permalink(); // Use WordPress function for permalink
			?>
			<div class="col-md-6 col-lg-4 col-12">
				<div class="single-blog">
					<a href="<?php echo esc_url($course_permalink); ?>">
						<img src="<?php echo esc_html($thumbnail_url); ?>" class="img-fluid" alt="<?php echo esc_attr(get_the_title()); ?>">
					</a>

					<div class="text">
						<a href="<?php echo esc_url($course_permalink); ?>">
							<h3><?php the_title(); ?></h3>
						</a>

						<div class="desc">
							<?php the_excerpt(); ?>
						</div>
					</div>
				</div>
			</div>
			<?php
				endwhile;
				// Reset post data
				wp_reset_postdata();
			else :
				echo '<p>No courses found.</p>';
			endif;
			?>
		</div>

		<!-- Pagination -->
		<div class="pagination">
			<?php
			echo paginate_links(array(
				'total' => $courses->max_num_pages,
				'current' => max(1, $paged),
				'prev_text' => 'السابق',
				'next_text' => 'التالي',
			));
			?>
		</div>
	</div>
</section>
<!-- Blogs -->

<?php get_footer(); ?>
