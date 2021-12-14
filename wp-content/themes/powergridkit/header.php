<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<script src="/wp-content/themes/powergridkit/js/jquery-3.6.0.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Archivo:wght@700&family=Overpass:wght@400;700;800&display=swap" rel="stylesheet">
	<title><?php echo get_the_title(); ?> | Power Grid Kit</title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
	<div class="container">
		<div class="main-header">
			<div class="branding">
				<a href="/"><img src="/wp-content/themes/powergridkit/img/logo.svg" alt="Power Grid Kit"></a>
			</div>
			<nav class="nav">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav>
			<div class="buy">
				<a href="/buy"><span>BUY THE KIT</span><img src="/wp-content/themes/powergridkit/img/cart.svg" alt=""></a>
			</div>
			<button class="hamburger">
				<span class="t"></span>
				<span class="m"></span>
				<span class="b"></span>
			</button>
		</div>
	</div>
</header>

<main>
