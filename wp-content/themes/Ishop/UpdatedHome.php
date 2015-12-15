<?php
/**
Template name: UpdatedHome
 */
get_header(); ?>

    <div id="primary" class="content-area grid_12">
        <div id="content" class="site-content" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'content', 'page' ); ?>


            <?php endwhile; // end of the loop. ?>

            <a class="category_home" href="<?php echo get_site_url(); ?>/кузовные-запчасти"><div><img src="<?php echo get_template_directory_uri();?>/images/Кузовные%20запчасти.jpg"><p>Кузовные запчасти</p></div></a>
            <a class="category_home" href="<?php echo get_site_url(); ?>/лампы"><div><img src="<?php echo get_template_directory_uri();?>/images/Лампы.jpg"><p>Лампы</p></div></a>
            <a class="category_home" href="<?php echo get_site_url(); ?>/расходники"><div><img src="<?php echo get_template_directory_uri();?>/images/Расходники.jpg"><p>Расходники</p></div></a>
            <a class="category_home" href="<?php echo get_site_url(); ?>/рулевое-управление"><div><img src="<?php echo get_template_directory_uri();?>/images/Рулевое%20управление.jpg"><p>Рулевое управление</p></div></a>
            <a class="category_home" href="<?php echo get_site_url(); ?>/система-подвески"><div><img src="<?php echo get_template_directory_uri();?>/images/Система%20подвески.jpg"><p>Система подвески</p></div></a>
            <a class="category_home" href="<?php echo get_site_url(); ?>/стекла"><div><img src="<?php echo get_template_directory_uri();?>/images/Стекла.jpg"><p>Стекла</p></div></a>
            <a class="category_home" href="<?php echo get_site_url(); ?>/тормозная-система"><div><img src="<?php echo get_template_directory_uri();?>/images/Тормозная%20система.jpg"><p>Тормозная система</p></div></a>
            <a class="category_home" href="<?php echo get_site_url(); ?>/трансмиссия"><div><img src="<?php echo get_template_directory_uri();?>/images/Трансмиссия.jpg"><p>Трансмиссия</p></div></a>
            <a class="category_home" href="<?php echo get_site_url(); ?>/щетки-стеклоочистителя"><div><img src="<?php echo get_template_directory_uri();?>/images/Щетки%20стеклоочистителя.jpg"><p>Щетки стеклоочистителя</p></div></a>
            <a class="category_home" href="<?php echo get_site_url(); ?>/электрика-освещение"><div><img src="<?php echo get_template_directory_uri();?>/images/Электрика%20и%20освещение.jpg"><p>Электрика и освещение</p></div></a>
        </div><!-- #content .site-content -->
    </div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>