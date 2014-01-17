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

<section id="content" role="main">

    <span class="leader">latest</span>
    <article>
        <h2>Using Razor in Javascript and CSS files</h2>
        <time datetime="2013-11-12T10:44:07+00:00">November 12, 2013</time>
        <p>There are countless use cases where I found myself needing to use <strong>Razor</strong> syntax (in ASP.NET MVC 3+) inside Javascript, CSS and other asset files. While there are many different ways to get Razor output into external JS files (for example, getting a <code>Url.<strong>Action</strong>()</code> call into a JS file’s jQuery.ajax() call), I find that most feel like beating around the bush. After all, views in MVC don’t always have to be HTML files, at least in the traditional spirit of MVC.</p>
    </article>    
</section>

<?php get_footer(); ?>