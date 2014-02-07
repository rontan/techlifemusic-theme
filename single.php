<?php get_header(); ?>

<section>

    <main id="content" role="main">
        
        <?php 
            // wordpress loop
            if (have_posts()): 
                while(have_posts()):
                    the_post();
                ?>

            <article role="article" itemscope itemtype="http://schema.org/BlogPosting">

                <header>
                    <span class="leader">latest</span>
                    <h2 itemprop="headline" name="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <time datetime="<?php the_time(DateTime::ISO8601); ?>"><?php the_time(get_option('date_format')); ?></time>
                </header>

                <section><?php the_content(); ?></section>

                <footer></footer>

                <?php comments_template('/comments.php', true); ?>

            </article>

        <?php   endwhile;
            endif;
            ?>    
    </main>

    <section id="sidebar">

        <div class="column">
            <?php get_sidebar('main-sb'); ?>
        </div>

        <div class="column">
            <?php get_sidebar('secondary-sb'); ?>
        </div>

    </section>

</section>

<?php get_footer(); ?>