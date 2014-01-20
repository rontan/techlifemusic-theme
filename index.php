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
        </article>    
    </main>

    <section id="sidebar">

        <div class="column">
        </div>

        <div class="column">
        </div>

    </section>

</section>

<?php get_footer(); ?>