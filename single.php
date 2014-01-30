<?php get_header(); ?>

<header>
    <h1><span>tech</span><span>life</span><span>music</span></h1>
    <nav>
        <ul>
            <li><a href="#">About</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Code</a></li>
        </ul>
    </nav>
    <section id="loupe">
        <div class="slide">
            <h4>I shoot photos.<br/>I'd also like to get better at it.</h4>
            <p>Meatloaf shank short loin, spare ribs prosciutto doner ground round sirloin. Tail shoulder pancetta t-bone. Andouille ground round shank, tri-tip flank pork chop testing yeah yeah.</p>
        </div>
        <div class="slide">
            <h4>I shoot photos.<br/>I'd also like to get better at it.</h4>
            <p>Meatloaf shank short loin, spare ribs prosciutto doner ground round sirloin. Tail shoulder pancetta t-bone. Andouille ground round shank, tri-tip flank pork chop.</p>
        </div>
        <div class="slide">
            <h4>I shoot photos.<br/>I'd also like to get better at it.</h4>
            <p>Meatloaf shank short loin, spare ribs prosciutto doner ground round sirloin. Tail shoulder pancetta t-bone. Andouille ground round shank, tri-tip flank pork chop.</p>
        </div>
    </section>
</header>

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