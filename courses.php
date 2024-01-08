<?php /* Template Name:courses */ ?>

<?php get_header(); ?>

<!-- courses -->
<section class="courses">
	<div class="container">
		<div>
			<?php
			$args = array(
				'post_type' => 'courses',
				'posts_per_page' => 1,
			);

			$blogs = new wp_query($args);

			if ($blogs->have_posts()) :
				while ($blogs->have_posts()) : $blogs->the_post();
					$thumbnail_url = get_the_post_thumbnail_url();
					$title = get_the_title();
					$price = get_field('price')
			?>

			<div class="main-title">
				<h1><?php echo esc_html($title); ?></h1>
			</div>

			<div class="single">
				<img src="<?php echo esc_html($thumbnail_url); ?>" class="img-fluid" alt="">
			</div>

			<div class="desc">
				<?php the_content(); ?>
			</div>

			<div class="price"><?php echo $price; ?></div>

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
<!-- courses -->

<?php get_footer(); ?>
