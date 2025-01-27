<?php

global $wp_query;
$page_id = $wp_query->post->ID;

get_header();


// get subjects and lectures
$lectures = get_field('lectures');

$lecture1 = $lectures['lecture1'];
$lecture2 = $lectures['lecture2'];
$lecture3 = $lectures['lecture3'];
$lecture4 = $lectures['lecture4'];
$lecture5 = $lectures['lecture5'];


$subjects = get_field('Subjects');

$subject1 = $subjects['lecture1'];
$subject2 = $subjects['lecture2'];
$subject3 = $subjects['lecture3'];
$subject4 = $subjects['lecture4'];
$subject5 = $subjects['lecture5'];

$hint = get_field('hint');
$announce = get_field('announce');
?>
<style>
.announce {
	padding: 30px 0;
}

.about-video {
	margin-bottom: 30px;
}

.lectures .detail ul,
.subjects .detail ul {
	display: flex;
	flex-direction: column;
	align-items: start;
	justify-content: start;
	list-style: none;
}

.subjects .detail ul {
	padding-inline-start: 0;
}

.subjects .detail ul li {
	font-size: 18px;
	margin-bottom: 12px;
}

section.testimonials.subjects {
	background: transparent !important;
}

.hint {
	background: #39957a;
	margin: 0 auto;
	text-align: center;
	padding: 20px;
	border-radius: 12px;
	color: #fff;
	font-size: 20px;
}

.lectures .detail ul li {
	list-style-type: none;
	position: relative;
	display: inline-block;
	padding-left: 0.8em;

	&::before {
		content: "";
		display: inline-block;
		position: absolute;
		right: -1.5em;
		top: 0;
		transform: rotate(45deg);
		height: 1.2em;
		width: 0.6em;
		border-bottom: 0.15em solid;
		border-right: 0.15em solid;
	}

	&:is(li) {
		margin-left: 1em;

		&:not(:first-child) {
			margin-top: 1em;
		}
	}
}

</style>

<section class="about">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div>
   			        <img src="<?php echo esc_url(get_template_directory_uri() . '/images/waratel.jpeg'); ?>" class="img-fluid" style="width: 325px;" alt="<?php echo esc_attr(get_the_title()); ?>">
                </div>
			</div>

			<div class="col-md-6">
				<?php
				$link = get_field('video_link');
				if ($link): ?>
				<div class="about-video">
					<iframe width="100%" height="315" src="<?php echo esc_url($link); ?>" title="YouTube video player"
						frameborder="0"
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
						allowfullscreen></iframe>
				</div>

				<?php endif; ?>
			</div>
			<div>
			</div>
		</div>

		<div class="desc">
			<p>
				<?= the_content(); ?>
			</p>
		</div>
</section>

<section class="testimonials lectures">
	<div class="container">
		<div class="main-title">
			<h2> المحاضرات</h2>
		</div>
		<?php if ($lectures) : ?>
		<div class="detail">
			<ul>
				<?php if ($lecture1): ?> <li><?= $lecture1; ?></li><?php endif; ?>
				<?php if ($lecture2): ?><li><?= $lecture2; ?></li><?php endif; ?>
				<?php if ($lecture3): ?> <li><?= $lecture3; ?></li><?php endif; ?>
				<?php if ($lecture4): ?><li><?= $lecture4; ?></li><?php endif; ?>
				<?php if ($lecture5): ?> <li><?= $lecture5; ?></li><?php endif; ?>

			</ul>
		</div>
		<?php endif; ?>
	</div>
</section>

<section class="testimonials subjects">
	<div class="container">
		<div class="main-title">
			<h2> المحاور</h2>
		</div>
		<?php if ($subjects) : ?>
		<div class="detail">
			<ul>
				<?php if ($subject1): ?> <li><?= $subject1; ?></li><?php endif; ?>
				<?php if ($subject2): ?><li><?= $subject2; ?></li><?php endif; ?>
				<?php if ($subject3): ?> <li><?= $subject3; ?></li><?php endif; ?>
				<?php if ($subject4): ?><li><?= $subject4; ?></li><?php endif; ?>
				<?php if ($subject5): ?> <li><?= $subject5; ?></li><?php endif; ?>

			</ul>
		</div>
		<?php endif; ?>
		<?php if ($hint) : ?>
		<div class="hint">

			<?= $hint; ?>
		</div>
		<?php endif; ?>
	</div>
</section>

<section class="testimonials">
	<div class="container">
		<div class="main-title">
			<h2>أراء طلابنا</h2>
		</div>

		<div class="nav-container"></div>
		<div class="owl-carousel owl-theme owl-testimonial">
			<?php
			$args = array(
				'post_type' => 'Testimonial',
				'posts_per_page' => -1,
				'order'          => 'ASC',
			);

			$testimonial_query = new wp_query($args);

			if ($testimonial_query->have_posts()) :
				while ($testimonial_query->have_posts()) : $testimonial_query->the_post();

					// $description = get_field('description_testimonials');
					$post_id =  get_field('page_link', false, false);

					$student_name = get_field('student_description');
					$student_description = get_field('student_description');
					$student_rating = get_field('student_rating');

					if ($post_id == $page_id): ?>

			<div class="item">
				<h3 class="name"><?= $student_name; ?></h3>

				<div class="desc">
					<?= $student_description; ?>
				</div>

				<div class="stars">
					<?php
								for ($i = 0; $i < $student_rating; $i++) {
									echo '<i class="bi-star-fill"></i>';
								}
								?>
				</div>
			</div>
			<?php

					endif;
				endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>
	</div>
</section>

<?php if ($announce): ?>
<section class="announce">
	<div class="container">
		<div class="conent">
			<?= $announce; ?>
		</div>
	</div>
</section>
<?php endif; ?>
<?php get_footer(); ?>
