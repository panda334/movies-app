@include('layouts.user_layout')


<section id="amy-page-header" class="amy-page-header">
	        <div class="amy-page-title amy-center">
            <div class="amy-inner container">
                <h1 class="page-title">
                    Genre:                     Cartoon                </h1>
                            </div>
        </div>
    </section>

<section class="amy-main-content amy-genre amy-list">
	<div class="container">
		<div class="row">
			
			<div class="col-md-8">
			<div class="amy-shortcode amy-mv-list ">
    

                
    
      
    <div class="list-content amy-ajax-content">
        
        <form method="GET" action="{{ route('categoryMovies', ['id' => '__ID__']) }}" id="category-form">
            <label for="category">Select a category:</label>
            <select name="id" id="category-select">
                <option value="">All</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit">Show Movies</button>
        </form>
        
        <script>
            document.getElementById('category-select').addEventListener('change', function() {
                var categoryId = this.value;
                var form = document.getElementById('category-form');
                var actionUrl = form.action.replace('__ID__', categoryId);
                form.action = actionUrl;
            });
        </script>

            @foreach ($movies as $movie)
                
        <article class="entry-item clearfix">
            <div class="entry-thumb">
                <a href="{{ route('singleMovie' , $movie->id) }}">
                    <img class="" src="{{ $movie->getFirstMediaUrl('images') }}">        
                </a>
            </div>
            <div class="entry-content">
                <h2 class="entry-title">
                    <a href="http://demo.amytheme.com/movie/demo/elementor-watch-online/amy_tvshow/vikings/">
                        {{ $movie->name }}        
                    </a>
                </h2>
                <div class="info-top">
                    <span class="pg">
                        HD 
                    </span>
        
                     <span class="duration">
                            <i class="fa fa-clock-o"></i>
                            {{ $movie->length }}
                    </span>
                            </div>
        
                <ul class="info-list">
                                    <li>
                            <label>
                                Actor:
                            </label>
                            <span>
                                @foreach ($movie->casts as $cast)
                                 @if($cast->job == 'actor')
                                 {{ $cast->first_name }} {{ $cast->last_name }}
                                 @endif
                                @endforeach                   
                            </span>
                        </li>
                    
                                    <li>
                            <label>
                                Director:
                            </label>
                            <span>
                                @foreach ($movie->casts as $cast)
                                    @if ($cast->job == 'director')
                                        {{ $cast->first_name }} {{ $cast->last_name }}
                                    
                                    @endif
                                @endforeach                  
                            </span>
                        </li>
                    
                                    <li>
                            <label>
                                Category:
                            </label>
                            <span>
                                @foreach ($movie->categories as $category)
                                    {{ $category->name }}
                                @endforeach
                            </span>
                        </li>
                    
                    
                                    <li>
                            <label>
                                Release:
                            </label>
                            <span>
                                {{ $movie->date }}                    
                            </span>
                        </li>
                    
                                    <li>
                            <label>
                                Language:
                            </label>
                            <span>
                                {{ $movie->language }}
                            </span>
                        </li>
                    
                                    <li>
                            <label>
                                Imdb:
                            </label>
                            <span>
                                {{ $movie->rate}}           
                            </span>
                        </li>
                    
                            </ul>
        
                
                    </div>
            <div class="clearfix"></div>
        
            </article>
            @endforeach

           </div>

    </div>			</div>

			<div class="col-md-4 amy-sidebar-clear"><div class="amy-page-sidebar amy-sidebar-right">
<aside id="sidebar">
	<div class="amy-widget amy-widget-module"><div class="amy-widget amy-widget-module contact "><h4 class="amy-title amy-widget-title">Contact Us</h4><div class="address"><i class="fa fa-location-arrow" aria-hidden="true"></i>9067 Zurich, Switzerland 87</div><div class="email"><i class="fa fa-envelope-o" aria-hidden="true"></i>abc@gmail.com</div><div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>01-234-5678</div></div><div class="clear"></div></div></aside>
</div></div>
		</div>
	</div>
</section>


			</div>
		<div id="amy-loading"><span></span></div></div>

		<footer id="amy-colophon" class="amy-site-footer">
<div class="container">
<div class="amy-footer-widgets">
<div class="row">
<div class="col-md-3 col-xs-12">
<div class="amy-widget widget_block">
<div class="wp-container-1 wp-block-group"><div class="wp-block-group__inner-container"><div class="widget amy-widget-module"><div class="amy-widget amy-widget-module about "><h4 class="amy-title amy-widget-title"></h4><div class="footer-logo"><a href="http://demo.amytheme.com/movie/demo/elementor-watch-online/"><img src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/uploads/sites/10/2022/05/img_65.png"></a></div><div class="summary">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</div></div></div></div></div>
<div class="clear"></div></div><div class="amy-widget widget_block">
<div class="wp-container-2 wp-block-group"><div class="wp-block-group__inner-container"></div></div>
<div class="clear"></div></div>
</div>
<div class="col-md-3 col-xs-12">
<div class="amy-widget widget_nav_menu"><div class="amy-widget-title"><h4>Customer Services</h4></div><div class="amy-widget-content"><ul id="menu-customer-services" class="menu"><li id="menu-item-436" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-436"><a href="http://demo.amytheme.com/movie/demo/elementor-watch-online/">Home</a></li>
</ul></div><div class="clear"></div></div>
</div>
<div class="col-md-3 col-xs-12">
<div class="amy-widget amy-widget-list"><div class="amy-widget amy-widget-list list-post "><h4 class="amy-title amy-widget-title">Recent News</h4><div class="entry-item"><div class="entry-thumb"><img src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/uploads/sites/10/2022/05/img_60-115x85_c.jpg"></div><div class="entry-content"><h2 class="entry-title"><a href="http://demo.amytheme.com/movie/demo/elementor-watch-online/six-book-to-film-adaptations-to-get-excited-about-this-autumn/">Six book-to-film adaptations to get excited about this autumn</a></h2><div class="entry-meta"><span class="entry-date">April 28, 2022</span><span> / </span><span class="entry-comment">0 Comments</span></div></div><div class="clearfix"></div></div><div class="entry-item"><div class="entry-thumb"><img src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/uploads/sites/10/2022/05/img_57-115x85_c.jpg"></div><div class="entry-content"><h2 class="entry-title"><a href="http://demo.amytheme.com/movie/demo/elementor-watch-online/the-beatles-eight-days-a-week-the-touring/">The Beatles: Eight Days a Week – The Touring</a></h2><div class="entry-meta"><span class="entry-date">April 28, 2022</span><span> / </span><span class="entry-comment">0 Comments</span></div></div><div class="clearfix"></div></div></div><div class="clear"></div></div>
</div>
<div class="col-md-3 col-xs-12">
<div class="amy-widget amy-widget-module"><div class="amy-widget amy-widget-module contact "><h4 class="amy-title amy-widget-title">Contact Us</h4><div class="address"><i class="fa fa-location-arrow" aria-hidden="true"></i>9067 Zurich, Switzerland 87</div><div class="email"><i class="fa fa-envelope-o" aria-hidden="true"></i>abc@gmail.com</div><div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>01-234-5678</div></div><div class="clear"></div></div>
</div>
</div>
</div>
</div>
</footer>
<div id="amy-copyright" class="amy-copyright">
<div class="container"><div class="amy-inner">


</div></div>
</div>	</div>

	<style>.wp-container-1 .alignleft { float: left; margin-right: 2em; }.wp-container-1 .alignright { float: right; margin-left: 2em; }</style>
<style>.wp-container-2 .alignleft { float: left; margin-right: 2em; }.wp-container-2 .alignright { float: right; margin-left: 2em; }</style>
<script type="text/javascript" src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-includes/js/jquery/ui/core.min.js?ver=1.13.1" id="jquery-ui-core-js"></script>
<script type="text/javascript" src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/themes/amy-movie/js/vendor/slick.min.js?ver=1.6.0" id="slick-js"></script>
<script type="text/javascript" src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/themes/amy-movie/js/vendor/isotope.pkgd.js?ver=3.0.1" id="isotope-pkd-js"></script>
<script type="text/javascript" src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/themes/amy-movie/js/vendor/masonry-horizontal.js?ver=2.0.0" id="masonry-horizontal-js"></script>
<script type="text/javascript" src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/themes/amy-movie/js/vendor/kinetic.js?ver=2.0.1" id="kinetic-js"></script>
<script type="text/javascript" src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/themes/amy-movie/js/vendor/smoothdivscroll.js?ver=1.3" id="smooth-scroll-js"></script>
<script type="text/javascript" src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/themes/amy-movie/js/vendor/jquery.mousewheel.min.js?ver=3.1.11" id="mousewheel-js"></script>
<script type="text/javascript" src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-includes/js/jquery/ui/datepicker.min.js?ver=1.13.1" id="jquery-ui-datepicker-js"></script>
<script type="text/javascript" id="jquery-ui-datepicker-js-after">
jQuery(function(jQuery){jQuery.datepicker.setDefaults({"closeText":"Close","currentText":"Today","monthNames":["January","February","March","April","May","June","July","August","September","October","November","December"],"monthNamesShort":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"nextText":"Next","prevText":"Previous","dayNames":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"dayNamesShort":["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],"dayNamesMin":["S","M","T","W","T","F","S"],"dateFormat":"MM d, yy","firstDay":1,"isRTL":false});});
</script>
<script type="text/javascript" src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/themes/amy-movie/js/vendor/jquery.fancybox.js?ver=3.5.7" id="fancybox-js"></script>
<script type="text/javascript" src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/themes/amy-movie/js/vendor/bootstrap-tab.js?ver=3.3.6" id="bootstrap-tab-js"></script>
<script type="text/javascript" src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-includes/js/imagesloaded.min.js?ver=4.1.4" id="imagesloaded-js"></script>
<script type="text/javascript" src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/themes/amy-movie/js/vendor/tooltipster.bundle.js?ver=1.0.0" id="tooltipster-js"></script>
<script type="text/javascript" src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/themes/amy-movie/js/vendor/jquery.waterwheelCarousel.js?ver=2.3.0" id="waterwheelCarousel-js"></script>
<script type="text/javascript" src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/themes/amy-movie/js/vendor/TweenMax.min.js?ver=1.15.1" id="TweenMax-js"></script>
<script type="text/javascript" src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/themes/amy-movie/js/vendor/jquery.mCustomScrollbar.js?ver=3.1.5" id="mCustomScrollbar-js"></script>
<script type="text/javascript" src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/themes/amy-movie/js/vendor/plyr.js?ver=1.0.0" id="plyr-js"></script>
<script type="text/javascript" src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/themes/amy-movie/js/vendor/reflection.js?ver=1.11.0" id="reflection-js"></script>
<script type="text/javascript" id="amy-movie-script-js-extra">
/* <![CDATA[ */
var amy_script = {"ajax_url":"http:\/\/demo.amytheme.com\/movie\/demo\/elementor-watch-online\/wp-admin\/admin-ajax.php","viewport":"992","site_url":"http:\/\/demo.amytheme.com\/movie\/demo\/elementor-watch-online\/","theme_url":"http:\/\/demo.amytheme.com\/movie\/demo\/elementor-watch-online\/wp-content\/themes\/amy-movie","enable_fb_login":null,"fb_app_id":null,"enable_google_login":null,"gg_app_id":null,"gg_client_id":null,"amy_rtl":"","amy_rate_already":"You already rate a movie","amy_rate_done":"You vote done"};
/* ]]> */
</script>
<script type="text/javascript" src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/themes/amy-movie/js/script.js?ver=1.0.0" id="amy-movie-script-js"></script>



</body></html>