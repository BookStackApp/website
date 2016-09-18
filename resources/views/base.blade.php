
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1">
    <meta name="theme-color" content="#13557D">

    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/images/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/images/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/images/apple-touch-icon-152x152.png" />

    <link rel="icon" type="image/png" href="/images/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="/images/favicon-192x192.png" sizes="192x192" />
    <link rel="icon" type="image/png" href="/images/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="/images/favicon-32x32.png" sizes="32x32" />


    @if(isset($title) && $title)
        <title>{{ $title }} - BookStack</title>
    @else
        <title>BookStack | A Simple and Free Documentation Platform</title>
    @endif
    <link rel="stylesheet" href="/dist/styles.min.css">

    @yield('head')

</head>

<body>

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
                <div class="col-sm-4 col-xs-8">
                    <div class="logo">
                        <a href="/">
                            {!! icon('logo') !!}
                            <h1>BookStack</h1>
                        </a>

                    </div>
                </div>
                <div class="col-sm-8 menu col-xs-4">
                    <button tabindex="1" id="menu-button" class="button muted" type="button">{!! icon('menu') !!}</button>
                    <div class="inner">
                        <a href="/docs"><span class="icon">{!! icon('book') !!}</span> Documentation</a>
                        <a href="/#features"><span class="icon">{!! icon('star') !!}</span> Features</a>
                        <a href="/#demo"><span class="icon">{!! icon('touch_app') !!}</span> Demo</a>
                        <a href="https://github.com/ssddanbrown/BookStack" target="_blank"><span class="icon">{!! icon('github') !!}</span> Github</a>
                        <a href="/blog" target="_blank"><span class="icon">{!! icon('rss_feed') !!}</span> Blog</a>
                    </div>
                </div>
            </div>
            @yield('header')
        </div>
    </header>

    <div id="content">
        @yield('content')
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
                    <a href="/docs"><span class="icon">{!! icon('book') !!}</span> Documentation</a>
                    <a href="/#features"><span class="icon">{!! icon('star') !!}</span> Features</a>
                    <a href="/#demo"><span class="icon">{!! icon('touch_app') !!}</span> Demo</a>
                    <a href="https://github.com/ssddanbrown/BookStack" target="_blank"><span class="icon">{!! icon('github') !!}</span> Github</a>
                    <a href="/blog" target="_blank"><span class="icon">{!! icon('rss_feed') !!}</span> Blog</a>
            	</div>
            </div>
        </div>
    </footer>


    <script async src="/dist/main.min.js"></script>

    @yield('scripts')
</body>

</html>
