<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery-1.11.3.min.js"></script>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/itshs.js"></script>
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" media="all" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" media="all" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.css">

</head>

<body <?php body_class(); ?>>
<div id="page">
    <header>
      <div class="container">
          <div class="row">
            <div class="col-md-2 col-xs-6">
                  <div id="logo"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/logo.jpg"></div>
            </div>
                        <div class="col-md-3 col-md-push-7 col-xs-6">
                    <div id="phones">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/phone-mobile.png"/>&nbsp;<i >(044) 383-21-20 &nbsp;</i><br>
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/phone.png" style="margin:8px 0 6px 0;"/>&nbsp;<i >(067) 218-47-01 &nbsp;</i>
                    </div>
            </div>
            <div class="col-md-7 col-md-pull-3 col-xs-12">
                   <nav id="topmenu" class="navbar navbar-default" role="navigation">
                       <div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                          
                       </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <?php
                            // Primary navigation menu.
                            wp_nav_menu( array(
                              'menu' => 'mainmenu',
                              'depth' => 2,
                              'container' => false,
                              'menu_class' => 'nav',
                              //Process nav menu using our custom nav walker
                              'walker' => new wp_bootstrap_navwalker())
                            );
                        ?>
                       </div>
                    </nav>
            </div>

          </div>
        </div>
    </header><!-- .site-header -->
    <sidebar>
       <div class="container">
           <div class="row">
               <div class="col-md-9 top-news">
                    <?php
                        if ( have_posts() ) : // если имеются записи в блоге.
                          query_posts('cat=3');   // указываем ID рубрик, которые необходимо вывести.
                          while (have_posts()) : the_post();  // запускаем цикл обхода материалов блога
                        ?>
                        Новини: <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <?php
                            break;
                            endwhile;  // завершаем цикл.
                        endif;
                        /* Сбрасываем настройки цикла. Если ниже по коду будет идти еще один цикл, чтобы не было сбоя. */
                        wp_reset_query();                
                    ?>
               </div>
               <div class="col-md-3">
                   <?php if ( is_active_sidebar( 'soc_icons' ) ) : ?>
                    <div class="soc-icons">
                    <?php dynamic_sidebar('soc_icons'); ?>
                    </div>
                    <?php endif; ?>
                    
               </div>
            </div>
       </div>
    </sidebar>
            


		
	<div id="content" class="site-content">
