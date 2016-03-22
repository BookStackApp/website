
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1">
    <title>BookStack | A Simple and Free Documenation Platform</title>

    <link rel="stylesheet" href="/dist/styles.min.css">

</head>

<body ontouchstart="">

    <script>
    // Standard Google Analytics Stuff
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-61486258-4', 'auto');
    ga('send', 'pageview');
    </script>

    <header id="header">
        <div class="container">
            <div class="row fix-mobile">
                <div class="col-sm-5 col-xs-8">
                    <div class="logo">
                        <img src="logo.svg" alt="BookStack">
                        <h1>BookStack</h1>
                    </div>
                </div>
                <div class="col-sm-7 menu col-xs-4">
                    <button ontouchstart="" tabindex="1" id="menu-button" class="button muted" type="button">{!! icon('menu') !!}</button>
                    <div class="inner">
                        <a href="#features"><span class="icon">{!! icon('star') !!}</span> Features</a>
                        <a href="#demo"><span class="icon">{!! icon('touch_app') !!}</span> Demo</a>
                        <a href="#screenshots"><span class="icon">{!! icon('image') !!}</span> Screenshots</a>
                        <a href="https://github.com/ssddanbrown/BookStack" target="_blank"><span class="icon">{!! icon('code') !!}</span> Github</a>
                        <a href="/blog" target="_blank"><span class="icon">{!! icon('rss_feed') !!}</span> Blog</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 spaced">
                    <h2 >Simple &amp; Free Documentation</h2>
                    <p>BookStack is a simple, self-hosted, easy-to-use platform for organising and storing information.</p>
                    <a href="https://github.com/ssddanbrown/BookStack" class="button pos "  target="_blank">View on GitHub</a>
                </div>
                <div class="col-md-8 screenshot-container">
                    <img class="screenshot" src="images/bookstack-hero-screenshot.png" alt="BookStack ScreenShot">
                </div>
            </div>
        </div>
    </header>
    <div class="container md-margin-top">
        <h2 id="features">Features</h2>
        <div class="row">
            <div class="col-sm-4">
                <h3><span class="icon">{!! icon('code') !!}</span>Free &amp; Open Source</h3>
                <p>BookStack is fully free and open, MIT licensed. The source is available on GitHub. There is no cost to downloading and installing your own instance of bookstack.
                </p>
                <p>
                    <a href="https://github.com/ssddanbrown/BookStack">View the source here &raquo;</a>
                </p>
            </div>
            <div class="col-sm-4" >
                <h3><span class="icon">{!! icon('laptop_chromebook') !!}</span>Easy, Simple Interface</h3>
                <p>
                    Simplicity has been the top priority when building BookStack. The page editor has a simple WYSIWYG interface and all content is broken into three simple real world groups:
                </p>
                <p>
                    <span class="icon book">{!! icon('book') !!}</span>Books &nbsp;&nbsp;<span class="icon chapter">{!! icon('collections_bookmark') !!}</span>Chapters&nbsp;&nbsp; <span class="icon page">{!! icon('description') !!}</span>Pages
                </p>
            </div>
            <div class="col-sm-4" >
                <h3><span class="icon">{!! icon('search') !!}</span>Searchable and Connected</h3>
                <p>
                    The content in BookStack is fully searchable. You are able to search at book level or across all books, chapters &amp; pages. The ability to link directly to any paragraph allows you to keeps your documentation connected.
                </p>
            </div>
        </div>
        <p>
            <br>
        </p>
        <div class="row">
            <div class="col-sm-4">
                <h3><span class="icon">{!! icon('build') !!}</span>Configurable</h3>
                <p>
                    Configuration options allow you to set-up BookStack to suit your use case. You can change the name, Logo and registration options. You can also change whether the whole system is publicly viewable or not.
                </p>
            </div>
            <div class="col-sm-4" >
                <h3><span class="icon">{!! icon('storage') !!}</span>Simple Requirements</h3>
                <p>
                    BookStack is built using PHP, on top of the Laravel framework and it uses MySQL to store data. Performance has been kept in mind and BookStack can run happily on a $5 Digital Ocean VPS.
                </p>
            </div>
            <div class="col-sm-4" >
                <h3><span class="icon">{!! icon('directions_boat') !!}</span>Powerful Features</h3>
                <p>
                    On top of the powerful search and linking there is also cross-book sorting, Page revisions, Image management. Some more mega-features are planned such as static-site generation and quick exporting.
                </p>
            </div>
        </div>
    </div>
    <div class="shaded md-margin-top padded-vertical large">
    	<div class="container">
    		<div class="row">
    			<div class="col-sm-6">
    				<h2 class="nomargin margin-bottom " id="demo">Try Out BookStack</h2>
    				<p>
    					You can try out BookStack right now by using the given details.
    					<strong>The demo database &amp; image storage is automatically reset every half hour.</strong>
    					Most standard actions are available using the provided admin login but some actions, listed below, have been restricted to keep the demo instance open &amp; available. That said, all options &amp; actions are at least visible to the demo admin user.
    				</p>
					<div>
						<strong>Actions Restricted In Demo</strong>
						<ul>
							<li>User deletion</li>
							<li>User updates</li>
							<li>Setting updates</li>
						</ul>
					</div>
    			</div>
    			<div class="col-sm-6 text-center">
					<div class="demo-box text-left " >
						<label>Demo site url</label> <br><a href="https://demo.bookstackapp.com" target="_blank">https://demo.bookstackapp.com</a> <br>
						<label>Admin email</label> <br><input type="text" onclick="this.select();" value="admin@example.com" readonly="true"><br>
						<label>Admin password</label> <br><input type="text" onclick="this.select();" value="password" readonly="true"> <br><br>
						<a href="https://demo.bookstackapp.com" class="button" target="_blank">Open demo site</a>
					</div>
    			</div>
    		</div>
    	</div>
    </div>

	<div class="padded-vertical large">
		<div class="container">
			<h2 class="nomargin margin-bottom" id="screenshots">Screenshots</h2>
			<div class="my-gallery">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
						<h3>Page View</h3>
						<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
						    <a href="images/screenshots/page-view.png" data-size="1920x1080">
						        <img src="images/screenshots/thumb_page-view.png" alt="Page View">
						    </a>
						</figure>
					</div>
					<div class="col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
						<h3>Page Editor</h3>
						<figure  itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
						    <a href="images/screenshots/page-edit.png" data-size="1920x1080">
						        <img src="images/screenshots/thumb_page-edit.png" alt="Page Editing">
						    </a>
						</figure>
					</div>
					<div class="col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
						<h3>Image Manager</h3>
						<figure  itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
						    <a href="images/screenshots/image-manager.png" data-size="1920x1080">
						        <img src="images/screenshots/thumb_image-manager.png" alt="Image Manager">
						    </a>
						</figure>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
						<h3>All Books Overview</h3>
						<figure  itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
						    <a href="images/screenshots/books-view.png" data-size="1920x1080">
						        <img src="images/screenshots/thumb_books-view.png" alt="View of all books">
						    </a>
						</figure>
					</div>
					<div class="col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
						<h3>Book Overview</h3>
						<figure  itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
						    <a href="images/screenshots/book-overview.png" data-size="1920x1080">
						        <img src="images/screenshots/thumb_book-overview.png" alt="Book Overview">
						    </a>
						</figure>
					</div>
					<div class="col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
						<h3>Book Sorting</h3>
						<figure  itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
						    <a href="images/screenshots/book-sorting.png" data-size="1920x1080">
						        <img src="images/screenshots/thumb_book-sorting.png" alt="Book Content Sorting View">
						    </a>
						</figure>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
						<h3>Global Search</h3>
						<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
						    <a href="images/screenshots/search.png" data-size="1920x1080">
						        <img src="images/screenshots/thumb_search.png" alt="Searching all content">
						    </a>
						</figure>
					</div>
					<div class="col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
						<h3>App Settings</h3>
						<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
						    <a href="images/screenshots/settings-view.png" data-size="1920x1080">
						        <img src="images/screenshots/thumb_settings-view.png" alt="Settings View">
						    </a>
						</figure>
					</div>
					<div class="col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
						<h3>Profile Update Page</h3>
						<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
						    <a href="images/screenshots/profile-edit-view.png" data-size="1920x1080">
						        <img src="images/screenshots/thumb_profile-edit-view.png" alt="Profile Editing Screen">
						    </a>
						</figure>
					</div>
				</div>

			</div>
		</div>
	</div>


    <div class="shaded md-margin-top padded-vertical large">
        <div class="container">
            <h2>Latest From The Blog</h2>
              @foreach($blogItems as $blogItem)
                <div class="row">
                    <div class="col-md-8">
                        <h3><a href="{{ $blogItem->link }}">{{ $blogItem->title }}</a></h3>
                        <p>{{ $blogItem->description }}&nbsp;<a href="{{ $blogItem->link }}">&raquo;</a></p>
                    </div>
                </div>
              @endforeach

              <div class="padded-top"><a class="button" href="/blog">Read the blog &raquo;</a></div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
            	<div class="col-lg-3">
            		<p>
            		    BookStack - Created By <a href="https://danb.me" title="danb.me" target="_blank">Dan Brown</a>
            		</p>
            	</div>
            	<div class="col-md-9 menu">
            	    <a href="#features"><span class="icon">{!! icon('star') !!}</span> Features</a>
            	    <a href="#demo"><span class="icon">{!! icon('touch_app') !!}</span> Demo</a>
            	    <a href="#screenshots"><span class="icon">{!! icon('image') !!}</span> Screenshots</a>
            	    <a href="https://github.com/ssddanbrown/BookStack" target="_blank"><span class="icon">{!! icon('code') !!}</span> Github</a>
                    <a href="/blog" target="_blank"><span class="icon">{!! icon('rss_feed') !!}</span> Blog</a>
            	</div>
            </div>
        </div>
    </footer>

    <!-- Root element of PhotoSwipe. Must have class pswp. -->
	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="pswp__bg"></div>
	    <div class="pswp__scroll-wrap">
	        <div class="pswp__container">
	            <div class="pswp__item"></div>
	            <div class="pswp__item"></div>
	            <div class="pswp__item"></div>
	        </div>
	        <div class="pswp__ui pswp__ui--hidden">
	            <div class="pswp__top-bar">
	                <div class="pswp__counter"></div>
	                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
	                <button class="pswp__button pswp__button--share" title="Share"></button>
	                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
	                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
	                <div class="pswp__preloader">
	                    <div class="pswp__preloader__icn">
	                      <div class="pswp__preloader__cut">
	                        <div class="pswp__preloader__donut"></div>
	                      </div>
	                    </div>
	                </div>
	            </div>
	            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
	                <div class="pswp__share-tooltip"></div>
	            </div>
	            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
	            </button>
	            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
	            </button>
	            <div class="pswp__caption">
	                <div class="pswp__caption__center"></div>
	            </div>
	        </div>
	    </div>
	</div>

    <script async src="libs/photoswipe.min.js"></script>
    <script async src="libs/photoswipe-ui-default.min.js"></script>
    <script async src="dist/main.min.js"></script>
</body>

</html>
