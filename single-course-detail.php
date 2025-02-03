<?php

global $wp_query;
$page_id = $wp_query->post->ID;

get_header();


// get subjects and lectures
$lectures = get_field('lectures');

$subjects = get_field('Subjects');

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

.course-image {
    border-radius: 15px;
    height: 350px;
    object-fit: cover;
}

@media only screen and (max-width: 767px) {
    .course-image {
        margin-bottom: 25px;
    }
}
</style>

<section class="about">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
			    <div>
				<?php
        			if (has_post_thumbnail()) {
        				the_post_thumbnail('full', array('class' => 'img-fluid course-image'));
        			}
        		?>
			    </div>
			</div>

			<div class="col-md-6">
				<?php
				$link = get_field('video_link');
				if ($link): ?>
				<div class="about-video h-100 mb-4">
					<?php
                    function get_embedded_youtube_url($url) {
                        $parsed_url = parse_url($url);
                        
                        // Handle shortened youtu.be links
                        if ($parsed_url['host'] === 'youtu.be') {
                            $video_id = trim($parsed_url['path'], '/');
                            return 'https://www.youtube.com/embed/' . $video_id;
                        }
                    
                        // Handle standard YouTube URLs (watch?v=VIDEO_ID)
                        if (isset($parsed_url['query'])) {
                            parse_str($parsed_url['query'], $query_params);
                            if (isset($query_params['v'])) {
                                return 'https://www.youtube.com/embed/' . $query_params['v'];
                            }
                        }
                    
                        // Handle YouTube Shorts format (youtube.com/shorts/VIDEO_ID)
                        if (strpos($parsed_url['path'], '/shorts/') === 0) {
                            $video_id = explode('/', $parsed_url['path'])[2] ?? '';
                            return 'https://www.youtube.com/embed/' . $video_id;
                        }
                    
                        // Return unchanged if already in embed format
                        return $url;
                    }

                    $embed_url = get_embedded_youtube_url($link);
                    ?>

					<!-- Embed YouTube Video -->
					<iframe width="100%" height="100%" src="<?php echo esc_url($embed_url); ?>" title="YouTube video player"
						frameborder="0"
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
						allowfullscreen>
					</iframe>

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
			<?= $lectures; ?>
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
			<?= $subjects; ?>
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

					$student_name = get_field('student_name');
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
