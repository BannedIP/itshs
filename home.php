<?php

get_header(); ?>





            <!-- Карусель -->
            <div class="carousel-container">
            <div class="container">
                <div id="myCarousel" class="carousel slide" data-interval="30000" data-ride="carousel">
                  <!-- Индикаторы для карусели -->
                  <ol class="carousel-indicators">
                    <!-- Перейти к 0 слайду карусели с помощью соответствующего индекса data-slide-to="0" -->
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <!-- Перейти к 1 слайду карусели с помощью соответствующего индекса data-slide-to="1" -->
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <!-- Перейти к 2 слайду карусели с помощью соответствующего индекса data-slide-to="2" -->
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>   
                  <!-- Слайды карусели -->
                  <div class="carousel-inner">
                    <!-- Слайды создаются с помощью контейнера с классом item, внутри которого помещается содержимое слайда -->
                    <?php
                
                                $i=true;
                                if ( have_posts() ) : // если имеются записи в блоге.
                                    query_posts('cat=3');   // указываем ID рубрик, которые необходимо вывести.
                                    while (have_posts()) : the_post();  // запускаем цикл обхода материалов блога
                                        if ($i):  $i=false;?>
                                            <div class="active item"> <?php
                                        else: echo "<div class=\"item\">";
                                        endif;
                    ?>
                                            <div class="carousel-caption">
                                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                                                    <?php the_content(); ?>

                                            </div>
                                            </div>
                    <?php
                
                                    endwhile;  // завершаем цикл.
                                endif;
                                /* Сбрасываем настройки цикла. Если ниже по коду будет идти еще один цикл, чтобы не было сбоя. */
                                wp_reset_query();                
                    ?>
                
                
                  </div><!-- carousel-inner -->
                
                </div><!-- myCarousel -->
                </div><!-- container -->
            </div><!-- carousel-container -->
            <!-- Карусель END -->
    <div class="container">  
            <div id="services">
                <?php
                    $args = array('post_type' => 'page','post_parent' => 54);
                    $my_q = new WP_Query($args);
                    //global $more;
                    $service_count=0;
                ?>
                <div class="row">
                <?php
                    while ( $my_q->have_posts() ) {
                        $my_q->the_post();
                        //$more = 0;
                        $service_count =+ 1;
                ?>
                    <div class="col-md-4"><?php the_content(); ?></div>
                <?php
                    if ($service_count == 3 || $service_count == 6) {
                        echo "</div><div class=\"row\">";   
                    }

                        //the_title(); // выведем заголовок поста
                    }
                    wp_reset_postdata();
                ?>
                </div>
           </div>

</div><!-- #content -->

<?php
get_sidebar();
get_footer();
