<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php bloginfo('name'); ?></title>
	<meta charset="<?php bloginfo('charset'); ?>">
	<link rel="shortcut icon" href="https://arabicquran.academy/wp-content/themes/quranacademy/images/favicon.png">
	<link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri() . '/images/favicon.png'); ?>">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@400;500;600;700;800&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

	<?php wp_head(); ?>

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	
	})(window,document,'script','dataLayer','GTM-K4BX4VRW');</script>
	<!-- End Google Tag Manager -->

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-1NDCMGFQFT"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	
	  gtag('config', 'G-1NDCMGFQFT');
	</script>
	
	<!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-10973137119"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'AW-10973137119');
    </script>
</head>

<body>
	<?php wp_body_open(); ?>

	<!-- Header -->
	<header>
		<nav class=" navbar navbar-expand-lg">
			<div class="container">
				<div class="navbar-brand">
					<?php the_custom_logo(); ?>
				</div>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mx-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="<?php echo home_url('/'); ?>">الرئيسية</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="<?php echo home_url('/') . '#about'; ?>">من نحن</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="<?php echo home_url('/') . '#services'; ?>">الدورات</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo home_url('/') . '#packages'; ?>">الباقات</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo site_url('/blogs'); ?>">المدونة</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo site_url('/courses'); ?>">دورات تعليمية</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo home_url('/') . '#contact'; ?>">تواصل معنا</a>
						</li>
					</ul>

					<a class="btn subscribe-btn" href="#packages">اشترك الأن</a>
				</div>
			</div>
		</nav>
	</header>
	<!-- Header -->
