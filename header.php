<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to begin
	/* rendering the page and display the header/nav
	/*-----------------------------------------------------------------------------------*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>
	<?php bloginfo('name'); // show the blog name, from settings ?> |
	<?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page ?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // We are loading our theme directory style.css by queuing scripts in our functions.php file,
	// so if you want to load other stylesheets,
	// I would load them with an @import call in your style.css
?>

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head();
// This fxn allows plugins, and Wordpress itself, to insert themselves/scripts/css/files
// (right here) into the head of your website.
// Removing this fxn call will disable all kinds of plugins and Wordpress default insertions.
// Move it if you like, but I would keep it around.
?>

</head>

<body>
	<div class="eats">
		<header class="eats-header">

      <i id="eats-icon-menu" class="eats-icon-menu eats-icon-menu icon-menu"></i>

      <i id="eats-icon-menu-close" class="eats-icon-menu-close eats-icon-menu icon-close"></i>

      <div class="eats-header-logo">
        <a class="eats-header-link" href="/">
          <i class="eats-icon-logo icon-logo"></i>
          <span class="eats-header-name">Eats.</span>
        </a>
      </div>


      <nav class="eats-nav">
        <?php wp_nav_menu( array(
          'theme_location' => 'primary',
          'menu_class'=> 'eats-nav-list',
          ) );
          // Display the user-defined menu in Appearance > Menus
        ?>
      </nav>

	  </header><!-- </div> -->
	<main class="eats-main"><!-- start the page containter -->
