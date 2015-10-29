<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery-1.11.3.min.js"></script>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<link rel="stylesheet" media="all" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" media="all" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.css">

</head>

<body <?php body_class(); ?>>
<div id="page">
    <header>
      <div class="container">
          <div class="row">
            <div class="col-md-2">
                  <div id="logo"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/logo.jpg"></div>
            </div>
            <div class="col-md-7">
                   <nav id="topmenu" class="navbar navbar-default" role="navigation">
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
                    </nav>
            </div>
            <div class="col-md-3">
                    <div id="phones">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/phone-mobile.png"/> : <i >.(044) 333-444-55.</i><br>
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/phone.png" style="margin:8px 0 6px 0;"/> : <i >.(044) 333-444-66.</i>
                    </div>
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
