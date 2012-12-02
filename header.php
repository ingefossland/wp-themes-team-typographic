<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&mdash;', true, 'right'); ?></title>

<?php /* http://t.co/dKP3o1e */ ?>
<meta name="HandheldFriendly" content="true" />
<meta name="MobileOptimized" content="320" />
<meta name="viewport" content="width=device-width; target-densitydpi=160dpi; initial-scale=1; maximum-scale=1" />

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link href="<?php bloginfo('template_url'); ?>/css/screen.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php bloginfo('template_url'); ?>/css/print.css" rel="stylesheet" type="text/css" media="print" />
<!--[if lt IE 9]>
<link href="<?php bloginfo('template_url'); ?>/css/screen-ie.css" rel="stylesheet" type="text/css" media="screen" />
<![endif]-->
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="grid">

<header id="header">
	<hgroup id="ident">
    	<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <h2><?php bloginfo('description'); ?></h2>
        
    </hgroup>

    <nav id="toolbar">
        <ul>
        	<li class="menu"><a href="#menu">Vis meny</a></li>
        	<li class="search"><a href="#search">Vis søk</a></li>
        </ul>
    </nav>

	<nav id="menu">
	
		<h2>Meny</h2>

		<ul>
			<li><a href="<?php bloginfo('url'); ?>/season/">Sesonger</a></li>
			<li><a href="<?php bloginfo('url'); ?>/players/">Spillere</a></li>
			<li><a href="<?php bloginfo('url'); ?>/teams/">Motstandere</a></li>
			<li><a href="<?php bloginfo('url'); ?>/grounds/">Baner</a></li>
		</ul>
	
	</nav>
	
	<nav id="search">

		<h2>Søk</h2>
	
		<form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
			<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" />
			<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" />
		</form>

	</nav>
	
</header>
