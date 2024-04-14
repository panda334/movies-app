@include('layouts.user_layout')




<section id="amy-page-header" class="amy-page-header">
    <div class="amy-page-title amy-center">
        <div class="amy-inner container">
            <h1 class="page-title">
                Favorite Movies
            </h1>
                    </div>
    </div>
	</section>
	<section class="main-content page-layout-">
		<div class="container">
			<div class="row">

				
				<div class="col-md-12">
					<div class="page-content">
								<div data-elementor-type="wp-page" data-elementor-id="571" class="elementor elementor-571">
									<section class="elementor-section elementor-top-section elementor-element elementor-element-a0f047c elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="a0f047c" data-element_type="section">
						<div class="elementor-container elementor-column-gap-default">
					<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-7d610c1" data-id="7d610c1" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-c770028 elementor-widget elementor-widget-Amy_Movie_List" data-id="c770028" data-element_type="widget" data-widget_type="Amy_Movie_List.default">
				<div class="elementor-widget-container">
			<div class="amy-shortcode amy-mv-list ">


                <form action="{{ route('search') }}" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="q"
                            placeholder="Search movies"> <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </form>
           
    
    <div class="list-content amy-ajax-content">
        @auth
            
        @foreach ($movies as $movie)
        
        <article class="entry-item clearfix">
            <div class="entry-thumb">
                <a href="{{ route('singleMovie' , $movie->id) }}">
                    <img class="" src="{{ $movie->getFirstMediaUrl('images') }}" alt="Kubo and the Two Strings">        
                </a>
               
            </div>
            <div class="entry-content">
                <h2 class="entry-title">
                    <a href="{{ route('singleMovie' , $movie->id) }}">
                        {{ $movie->name }}          
                    </a>
                </h2>
                <div class="info-top">
                    <span class="pg">
                        HD
                    </span>
        
                         <span class="duration">
                            <i class="fa fa-clock-o"></i>
                            {{ $movie->length }}  hour
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
                                {{ $movie->rate }}                   
                            </span>
                        </li>
                        <form action="{{ route('addToFavorite', [$movie->id, Auth::user()->id]) }}" method="POST">
                            @csrf
                            <button style="font-size:24px" type="submit"><i class="material-icons">favorite</i></button>
                        </form>
                            </ul>
        
                
                    </div>
            <div class="clearfix"></div>


            </article>
        @endforeach
        @endauth
        

   </div>

    <div class="clear">
        </div>
        <nav class="amy-pagination">
            <div class="amy-shadow">
                {{ $movies->links() }}


            </div>
            </nav>
        </div>		
    </div>
</div>
					
</div>
		</div>
				<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-f58ed98" data-id="f58ed98" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-d2ae6f0 elementor-widget elementor-widget-sidebar" data-id="d2ae6f0" data-element_type="widget" data-widget_type="sidebar.default">
				<div class="elementor-widget-container">
			<div class="amy-widget widget_block widget_media_image">
<figure class="wp-block-image size-full">
    <img loading="lazy" width="350" height="290" src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/uploads/sites/10/2022/05/img_63.png" alt="" class="wp-image-540" srcset="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/uploads/sites/10/2022/05/img_63.png 350w, http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/uploads/sites/10/2022/05/img_63-300x249.png 300w" sizes="(max-width: 350px) 100vw, 350px">
</figure>
<div class="clear">
    </div>
</div>
<div class="amy-widget amy-widget-list">
    <div class="amy-widget amy-widget-list list-movie ">
        <a href="{{ route('topMovies') }}">
        <h4 class="amy-title amy-widget-title">Top Movie</h4>
        </a>
        @foreach ($movies->take(3) as $movie)
        <div class="entry-item">
            <div class="entry-thumb">
                <img class="" src= "{{ $movie->getFirstMediaUrl('images') }}" width="100" height="100">
            </div>
            <div class="entry-content">
                <h2 class="entry-title">
     <a href="{{ route('singleMovie' , $movie->id)}}">
        {{ $movie->name }}
    </a>
    </h2>
<div>
    <span class="duration">
        <i class="fa fa-clock-o">
            {{ $movie->length }}  hour
            </i>
        </span>
    </div>
    <div class="genre">
        @foreach ($movie->categories as $category)
        <span>
            {{ $category->name }}
        </span>
        @endforeach
    </div>
</div>
<div class="clearfix">
    </div>
</div>
        @endforeach
    </div>
</div>
                </div>
                                </div>
            </div></div></div></section></div></div></div></div></div></section></div></div></div></body>

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
<script type="text/javascript" src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/plugins/elementor/assets/js/webpack.runtime.min.js?ver=3.6.5" id="elementor-webpack-runtime-js"></script>
<script type="text/javascript" src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/plugins/elementor/assets/js/frontend-modules.min.js?ver=3.6.5" id="elementor-frontend-modules-js"></script>
<script type="text/javascript" src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min.js?ver=4.0.2" id="elementor-waypoints-js"></script>
<script type="text/javascript" id="elementor-frontend-js-before">
var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false,"isScriptDebug":false},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","download":"Download","downloadImage":"Download image","fullscreen":"Fullscreen","zoom":"Zoom","share":"Share","playVideo":"Play Video","previous":"Previous","next":"Next","close":"Close"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"responsive":{"breakpoints":{"mobile":{"label":"Mobile","value":767,"default_value":767,"direction":"max","is_enabled":true},"mobile_extra":{"label":"Mobile Extra","value":880,"default_value":880,"direction":"max","is_enabled":false},"tablet":{"label":"Tablet","value":1024,"default_value":1024,"direction":"max","is_enabled":true},"tablet_extra":{"label":"Tablet Extra","value":1200,"default_value":1200,"direction":"max","is_enabled":false},"laptop":{"label":"Laptop","value":1366,"default_value":1366,"direction":"max","is_enabled":false},"widescreen":{"label":"Widescreen","value":2400,"default_value":2400,"direction":"min","is_enabled":false}}},"version":"3.6.5","is_static":false,"experimentalFeatures":{"e_dom_optimization":true,"e_optimized_assets_loading":true,"e_optimized_css_loading":true,"a11y_improvements":true,"e_import_export":true,"additional_custom_breakpoints":true,"e_hidden_wordpress_widgets":true,"landing-pages":true,"elements-color-picker":true,"favorite-widgets":true,"admin-top-bar":true},"urls":{"assets":"http:\/\/demo.amytheme.com\/movie\/demo\/elementor-watch-online\/wp-content\/plugins\/elementor\/assets\/"},"settings":{"page":[],"editorPreferences":[]},"kit":{"active_breakpoints":["viewport_mobile","viewport_tablet"],"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description"},"post":{"id":571,"title":"Movie%20List%20Sidebar%20%E2%80%93%20Elementor%20Watch%20Online","excerpt":"","featuredImage":false}};
</script>
<script type="text/javascript" src="http://demo.amytheme.com/movie/demo/elementor-watch-online/wp-content/plugins/elementor/assets/js/frontend.min.js?ver=3.6.5" id="elementor-frontend-js"></script><span id="elementor-device-mode" class="elementor-screen-only"></span>



</body></html>