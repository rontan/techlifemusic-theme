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

                <?php comments_template(); ?>

            </article>

        <?php
                endwhile;
            endif;
            ?>

        <?php /*
        <article>
            <header>
                <span class="leader">latest</span>
                <h2 name="Using Razor in Javascript and CSS files">Using Razor in Javascript and CSS files</h2>
                <time datetime="2013-11-12T10:44:07+00:00">November 12, 2013</time>
            </header>
            <p>There are countless use cases where I found myself needing to use <strong>Razor</strong> syntax (in ASP.NET MVC 3+) inside Javascript, CSS and other asset files. While there are many different ways to get Razor output into external JS files (for example, getting a <code>Url.<strong>Action</strong>()</code> call into a JS file’s jQuery.ajax() call), I find that most feel like beating around the bush. After all, views in MVC don’t always have to be HTML files, at least in the traditional spirit of MVC.</p>
            <pre><code>public class AssetController : Controller {
    
    public ActionResult Styles () {

        Response.ContentType = “text/css”;
        
        var model = Context.GetEntity();
        return View(model);
    }
}
</code></pre>
            <p>With all that said and done though, I believe that this is the way to correctly use views in an MVC framework, and that Visual Studio should perhaps allows for better leniency for use cases such as this. I’d love to hear your ideas on the topic though.</p>

            <!-- standard image markup with a link -->
            <div class="wp-caption">
                <a href="#">
                    <img src="http://upload.wikimedia.org/wikipedia/commons/6/66/Goats_in_Batanes.png" />
                </a>
                <p class="wp-caption-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit iste et maxime exercitationem magni sed mollitia cum voluptas quo voluptate!</p>
            </div>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam, atque beatae sit molestiae laborum et enim laboriosam odio suscipit ipsam ea modi optio ab sapiente expedita. Fugiat, blanditiis, voluptatibus ex quia mollitia cum nulla maxime a eius fuga nemo rerum unde rem sint id eum laudantium sunt et nobis odit?</p>

            <ul>
                <li>List item 1</li>
                <li>This is a nested list.
                    <ul>
                        <li>Sub-list item 1</li>
                        <li>Sub-list item 2</li>
                    </ul>
                </li>
                <li>List item 2</li>                
            </ul>

            

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit reprehenderit fugiat labore vero itaque reiciendis sed soluta sequi.</p>

            <ol>
                <li>List item 1</li>
                <li>This is a nested list.
                    <ol>
                        <li>Sub-list item 1</li>
                        <li>Sub-list item 2</li>
                        <li>Another nested list
                            <ol>
                                <li>Sub sub list item</li>
                                <li>Whoa nelly!</li>
                            </ol>
                        </li>
                    </ol>
                </li>
                <li>List item 2</li>
            </ol>   

            <h3>Quotes tests</h3>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, minus?</p>

            <blockquote>
                <p>This is a standard blockquote. It should be centered on the page, with no elements to its left or right.</p>
                <p><span>Abraham Lincoln (<a href="#">some link</a>)</span></p>
            </blockquote>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, recusandae cupiditate aliquam quae voluptate cumque veniam et nostrum numquam doloribus animi laudantium iste officia dolor?</p>
            <blockquote class="alignleft">
                <p>This is a pull quote. On larger screens, this should be flushed towards the left.</p>
                <p><span>Leeroy Jenkins (<a href="#">some link</a>)</span></p>
            </blockquote>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, voluptas, maxime accusamus accusantium voluptatum sunt doloribus ut eaque consectetur beatae alias natus tenetur quas saepe fuga dolorem voluptatibus iure vitae magnam minima placeat recusandae non quisquam omnis rerum nihil hic nesciunt aspernatur delectus quo optio eveniet dolore neque aut ipsum ex veniam error dicta at asperiores adipisci unde. Animi, quae placeat repudiandae voluptatibus beatae consequuntur unde sapiente autem dolore explicabo corrupti id saepe repellendus deserunt illum nam nemo sunt iure architecto temporibus suscipit enim illo nobis magni vero soluta quos obcaecati! Beatae adipisci delectus consequuntur dolore rem ipsa molestias tempore!</p>
            <blockquote class="alignright">
                <p>This is a pull quote. On larger screens, this should be flushed towards the right.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit, tenetur nobis dolorum.</p>
                <p><span>Magtataho sa kanto, January 2014 (<a href="#">some link</a>)</span></p>
            </blockquote>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates aut neque modi at impedit unde voluptatibus corporis doloribus alias dolor! Repellat, necessitatibus, quod, et laboriosam nihil mollitia sequi labore placeat reprehenderit assumenda excepturi recusandae ea vero libero incidunt. Placeat, quo, repudiandae, cum architecto hic necessitatibus laudantium labore nisi optio ex error incidunt aliquam aspernatur facere commodi tempora porro reprehenderit quos voluptates mollitia voluptate culpa voluptatem odit? Quia, dolorem, amet similique quo nihil incidunt eaque eligendi id iste rerum itaque necessitatibus exercitationem quos libero molestiae! Id, dolores, labore dicta quis natus tenetur fugit ipsum ipsa cumque sapiente nihil beatae distinctio repellendus excepturi nostrum pariatur possimus cupiditate quam aliquid consequatur? Voluptatem, autem, expedita, nobis aspernatur quam pariatur omnis ducimus est quibusdam ratione reiciendis animi dolor impedit ipsam possimus numquam ab explicabo inventore quo eveniet quos eum debitis velit quas error a laborum dicta id cumque. Aliquam sed ipsa at explicabo in porro.</p>

            <h3>Headers tests</h3>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, pariatur!</p>

            <h4>This is a heading 4</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, tempore, blanditiis, ab itaque ratione nisi doloribus aliquid minus explicabo saepe consequatur maiores illo mollitia est.</p>

            <h5>This is a heading 5</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, veniam.</p>

            <h6>This is a heading 6</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, commodi vitae nam officia provident ex vel ut fugit non cupiditate delectus fugiat soluta cum quae tenetur dolor maxime at magni dignissimos voluptates enim debitis voluptatem.</p>

            <h3>Asides</h3>
            <p>Asides are snippets of text that provide explanatory text or what supplementary information that the main text requires.</p>

            <aside>This aside supplements the next paragraph. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, dicta?</aside>
            <p>This paragraph should have an supplementary text attributed to it. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, at, iusto, quo fugiat aspernatur porro libero omnis vitae rerum natus asperiores vero similique ipsum eum!</p>

        </article>
        */ ?>
    </main>

    <section id="sidebar">

        <div class="column">
        </div>

        <div class="column">
        </div>

    </section>

</section>

<?php get_footer(); ?>