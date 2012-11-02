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
    	<h1><span><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
        <h2><?php bloginfo('description'); ?></h2>
    </hgroup>
	<nav><?php //wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?></nav>
</header>
