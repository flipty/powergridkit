<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;500;700&display=swap" rel="stylesheet">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="60x60" href="/apple-touch-icon-60x60.png" />
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon-precomposed" sizes="76x76" href="/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="/apple-touch-icon-152x152.png" />
	<link rel="icon" type="image/png" href="/favicon.png" sizes="196x196" />
	<link rel="icon" type="image/png" href="/favicon.png" sizes="96x96" />
	<link rel="icon" type="image/png" href="/favicon.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="/favicon.png" sizes="16x16" />
	<link rel="icon" type="image/png" href="/favicon.png" sizes="128x128" />
	<meta name="application-name" content="Behavioral Grooves Podcast"/>
	<meta name="msapplication-TileColor" content="#FFFFFF" />
	<meta name="msapplication-TileImage" content="/mstile-144x144.png" />
	<meta name="msapplication-square70x70logo" content="/mstile-70x70.png" />
	<meta name="msapplication-square150x150logo" content="/mstile-150x150.png" />
	<meta name="msapplication-wide310x150logo" content="/mstile-310x150.png" />
	<meta name="msapplication-square310x310logo" content="/mstile-310x310.png" />
    <title><?php echo get_the_title(); ?> | Power Grid Kit</title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
	<div class="contained">
		<div class="branding">
			<a href="/">
				<img src="<?php echo get_template_directory_uri(); ?>/img/white-record-2.svg" alt="Behavioral Grooves">
			</a>
		</div>

		<?php wp_nav_menu('primary'); ?>

		<div class="search-trigger">
			<a href="/?s=">
				<img src="<?php echo get_template_directory_uri(); ?>/img/search.png" alt="Behavioral Grooves">
			</a>
		</div>
		<a class="hamburger">
			<span class="top"></span>
			<span class="mid"></span>
			<span class="bot"></span>
		</a>
		<div class="search-bar">
			<?php //get_search_form(); ?>
		</div>
	</div>
</header>
<main>
