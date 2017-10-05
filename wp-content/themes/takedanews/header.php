<!doctype html>
<html <?php language_attributes(); ?> id="top">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <script src="https://use.fontawesome.com/61e276dab6.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

    <div class="search__container">
        <div class="search__form">
            <?php get_search_form(); ?>
        </div>
    </div>

    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'takedanews' ); ?></a>

    <header id="masthead" class="site-header">
        <div class="site-header__container">
            <div class="site-header__logo-container">
                <img src="<?php echo get_template_directory_uri(); ?>/img/takeda_logo.svg" alt="Takeda" title="Takeda" class="site-header__logo">
	            <?php if(is_front_page()) : ?>
                    <h1 class="site-header__site-title">Newsroom</h1>
	            <?php else : ?>
                    <div class="site-header__site-title">Newsroom</div>
	            <?php endif; ?>
            </div>

            <a href="#" class="search__button"><i class="fa fa-search"></i></a>
        </div>
    </header><!-- #masthead -->

    <div id="content" class="site-content">
