<?php get_header(); ?>

<!-- Hero -->
<?php
$args = array(
	'post_type' => 'hero_slide',
	'posts_per_page' => 1,
);

$hero_slide_query = new wp_query($args);

if ($hero_slide_query->have_posts()) :
	while ($hero_slide_query->have_posts()) : $hero_slide_query->the_post();
		$thumbnail_url = get_the_post_thumbnail_url();
		$title = get_the_title();
		$description = get_field('description_slider');
?>
<section class="hero" style="background-image: url('<?php echo esc_html($thumbnail_url); ?>');">
	<div class="container">
		<div class="text">

			<h1><?php echo esc_html($title); ?></h1>
			<p><?php echo esc_html($description); ?></p>
			<a class="btn learn-btn" href="#packages">تعلم القرآن الكريم الآن</a>
		</div>
	</div>
</section>
<?php

	endwhile;
	wp_reset_postdata();
endif;
?>
<!-- Hero -->

<!-- Offers -->
<section class="offers">
	<div class="container">
		<div class="row">
			<?php
			$args = array(
				'post_type' => 'offer',
				'posts_per_page' => 4,
				'order'          => 'ASC',
			);

			$offers_query = new wp_query($args);

			if ($offers_query->have_posts()) :
				while ($offers_query->have_posts()) : $offers_query->the_post(); ?>
			<div class="col-lg-3 col-6">
				<div class="offer">
					<a href="https://wa.me/966576593554" class="text-decoration-none" style="color: #000;">⁦⁩
						<div>
							<?php the_post_thumbnail(); ?>
							<p><?php the_title(); ?></p>
						</div>
					</a>
				</div>
			</div>
			<?php
				endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>
	</div>
</section>
<!-- Offers -->

<!-- About -->
<section class="about" id="about">
	<div class="container">
		<div class="row">
			<?php
			$args = array(
				'post_type' => 'about-section',
				'posts_per_page' => 1,
			);

			$about_query = new wp_query($args);

			if ($about_query->have_posts()) :
				while ($about_query->have_posts()) : $about_query->the_post();
			?>
			<div class="col-md-6">
				<div class="about-text">
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</div>
			</div>

			<div class="col-md-6">
				<div class="about-video">
					<?php
							$video_link = get_field('video_link')
							?>

					<iframe width="100%" height="315" src="<?php echo esc_html($video_link); ?>" title="YouTube video player"
						frameborder="0"
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
						allowfullscreen></iframe>
				</div>
			</div>
			<?php
				endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>
	</div>
</section>
<!-- About -->

<!-- Counter -->
<section class="counter">
	<div class="container">
		<div class="row">
			<?php
			$args = array(
				'post_type' => 'counter-section',
				'posts_per_page' => 4,
				'order'          => 'ASC',
			);

			$counter_query = new wp_query($args);

			if ($counter_query->have_posts()) :
				while ($counter_query->have_posts()) : $counter_query->the_post(); ?>
			<div class="col-lg-3 col-6">
				<div class="counter-box">
					<?php
							// Retrieve the featured image
							if (has_post_thumbnail()) {
								the_post_thumbnail();
							}
							?>
					<div>
						<?php
								// Retrieve the counter number custom field
								$counter_number = get_post_meta(get_the_ID(), 'counter_number', true);
								if (!empty($counter_number)) {
									echo '<span>' . esc_html($counter_number) . '</span>';
								}
								?>
						<p><?php the_title(); ?></p>
					</div>
				</div>
			</div>
			<?php
				endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>
	</div>
</section>
<!-- Counter -->

<!-- Services -->
<section class="services" id="services">
	<div class="container">
		<div class="main-title">
			<h2>خدمات أكاديمية قرأن عربي</h2>
		</div>

		<div class="row">
			<?php

			$args = array(
				'post_type' => 'service-section',
				'posts_per_page' => -1,
				'order'          => 'ASC',
			);

			$service_query = new wp_query($args);

			if ($service_query->have_posts()) :
				while ($service_query->have_posts()) : $service_query->the_post();
			?>
			<div class="col-md-6 col-lg-4 col-12">
				<a href="https://wa.me/966576593554" class="text-decoration-none" style="color: #000;">
					<div class="service">
						<?php
								if (has_post_thumbnail()) {
									the_post_thumbnail('full', array('class' => 'img-fluid'));
								}
								?>
						<h3><?php the_title(); ?></h3>
					</div>
				</a>
			</div>
			<?php
				endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>
	</div>
</section>
<!-- Services -->

<!-- Testimonials -->
<section class="testimonials">
	<div class="container">
		<div class="main-title">
			<h2>أراء طلابنا</h2>
		</div>

		<div class="nav-container"></div>
		<div class="owl-carousel owl-theme">
			<?php
			$args = array(
				'post_type' => 'testimonial-section',
				'posts_per_page' => -1,
				'order'          => 'ASC',
			);

			$testimonial_query = new wp_query($args);

			if ($testimonial_query->have_posts()) :
				while ($testimonial_query->have_posts()) : $testimonial_query->the_post();

					$description = get_field('description_testimonials')
			?>
			<div class="item">
				<h3 class="name"><?php the_title(); ?></h3>

				<div class="desc">
					<?php echo esc_html($description); ?>
				</div>

				<div class="stars">
					<i class="bi-star-fill"></i>
					<i class="bi-star-fill"></i>
					<i class="bi-star-fill"></i>
					<i class="bi-star-fill"></i>
					<i class="bi-star-fill"></i>
				</div>
			</div>
			<?php
				endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>
	</div>
</section>
<!-- Testimonials -->

<!-- Packages -->
<section class="packages" id="packages">
	<div class="container">
		<div class="main-title">
			<h2>أسعار الباقات</h2>
		</div>

		<div class="row">
			<?php
			$args = array(
				'post_type' => 'package-section',
				'posts_per_page' => -1,
				'order'          => 'ASC',
			);

			$package_query = new wp_query($args);

			if ($package_query->have_posts()) :
				while ($package_query->have_posts()) : $package_query->the_post();
			?>
			<div class="col-md-6 col-lg-4 col-12">
				<div class="package">
					<div class="top">
						<h3 class="title"><?php the_title(); ?></h3>

						<?php
								$price = get_field('package_price');
								$adv_1 = get_field('adv_1');
								$adv_2 = get_field('adv_2');
								$adv_3 = get_field('adv_3');
								$adv_4 = get_field('adv_4');
								?>

						<p class="price"><?php echo esc_html($price); ?>
							<img src="<?php echo esc_url(get_template_directory_uri() . '/images/icons/rs.svg'); ?>" alt="">
						</p>

						<p class="text-center">شهريـــا</p>

						<ul>
							<li><?php echo esc_html($adv_1); ?></li>
							<li><?php echo esc_html($adv_2); ?></li>
							<li><?php echo esc_html($adv_3); ?></li>
							<li><?php echo esc_html($adv_4); ?></li>
						</ul>
					</div>

					<div class="text-center bottom">
						<a class="btn subscribe-btn" href="https://wa.me/966576593554">اشترك الأن</a>
					</div>
				</div>
			</div>
			<?php
				endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>
	</div>
</section>
<!-- Packages -->

<!-- Blogs -->
<!-- <section class="blogs">
	<div class="container">
		<div class="main-title">
			<h2>المدونة</h2>
		</div>

		<div class="row">
			<?php
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 6,
			);

			$blogs = new wp_query($args);

			if ($blogs->have_posts()) :
				while ($blogs->have_posts()) : $blogs->the_post();
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
			?>
		</div>

		<div class="text-center">
			<a class=" btn blogs-btn" href="<?php echo site_url('/blog'); ?>">المزيد من
				المقالات</a>
		</div>
	</div>
</section> -->
<!-- Blogs -->

<!-- Contact -->
<?php
$args = array(
	'post_type' => 'contact_section',
	'posts_per_page' => 1,
);

$contact_section_query = new wp_query($args);

if ($contact_section_query->have_posts()) :
	while ($contact_section_query->have_posts()) : $contact_section_query->the_post();
		$thumbnail_url = get_the_post_thumbnail_url();
?>
<section class="contact" id="contact" style="background-image: url('<?php echo esc_html($thumbnail_url); ?>');">
	<div class="container">
		<div class="main-title">
			<h2>يسعدنا تواصلكم معنا</h2>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="contact-form">
					<form action="#" method="post" id="custom-form">
						<input type="hidden" name="action" value="custom_form_submission">

						<div class="row">
							<div class="col-12 mb-3">
								<input type="text" class="form-control" name="name" placeholder="الاسم" required>
							</div>

							<div class="col-12 mb-3">
								<input type="number" class="form-control" name="phone" placeholder="رقم الهاتف" required>
							</div>

							<div class="col-12 mb-3">
								<textarea class="form-control" name="message" placeholder="الرسالة" rows="6"
									required></textarea>
							</div>

							<div class="col-12">
								<button class="btn submit-btn" type="submit">إرسال</button>
							</div>
						</div>
					</form>

					<div class="alert alert-success" role="alert" id="thank-you-message" style="display: none;">
						تم إرسال رسالتك بنجاح
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="info">
					<div class="email">
						<img src="<?php echo esc_url(get_template_directory_uri() . '/images/icons/email.svg'); ?>" alt="">
						<p>
							<a href="mailto: contact@arabicquran.academy">contact@arabicquran.academy</a>
						</p>
					</div>

					<div class="whatsapp">
						<img src="<?php echo esc_url(get_template_directory_uri() . '/images/icons/whatsapp.svg'); ?>" alt="">
						<p>
							<a href="https://wa.me/966576593554">⁦⁦+966 57 659 3554⁩</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
	endwhile;
	wp_reset_postdata();
endif;
?>
<!-- Contact -->

<?php get_footer(); ?>
