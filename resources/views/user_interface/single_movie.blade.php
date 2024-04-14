
@include('layouts.user_layout')
<link rel="stylesheet" type="text/css" href="styles.css" />



<section class="main-content amy-movie single-movie layout-right has-banner">
    <div class="container">
        <div class="row">
                        <div class="col-md-8">
                <div class="page-content">
<article id="post-133" class="post-133 amy_movie type-amy_movie status-publish amy_genre-cartoon amy_genre-sci-fi amy_actor-alexander-cattly amy_actor-cartin-hollia amy_actor-humpray-richard amy_director-gally-peckin amy_director-mae-west">
			<div class="entry-top">
			<div class="entry-poster">
                <img class="" src="{{ $movies->getFirstMediaUrl('images') }}" alt="Jumanji: Welcome to the Jungle">			
            </div>
			<div class="entry-info">
				<h1 class="entry-title p-name" itemprop="name headline">
                    <span>
                 {{ $movies->name }}   
                    </span>
    
</h1>


<div class="entry-pg">
			<span class="pg">Hd</span>
	
			<span class="duration">
			<i class="fa fa-clock-o"></i>
			{{ $movies->length }}  hour
            </span>
</div>

<ul class="info-list">
	        <li>
            <label>
                Actor:
            </label>
            <span>
                @foreach ($movies->casts as $cast)
                @if($cast->job == 'actor')
                {{ $cast->first_name}} {{ $cast->last_name }}
                @endif
                @endforeach
                 
            </span>
        </li>
	
	        <li>
            <label>
                Director:
            </label>
            <span>
                <a >Gally Peckin</a>, 
                <a >Mae West</a>            
            </span>
        </li>
	
	        <li>
            <label>
                Genre:
            </label>
            <span>
                @foreach ($movies->categories as $category)
                    {{ $category->name }}
                @endforeach
           
            </span>
        </li>
	
	        <li>
            <label>
                Release:
            </label>
            <span>
                {{ $movies->date }}            
            </span>
        </li>
	
	        <li>
            <label>
                Language:
            </label>
            <span>
                {{ $movies->language }}
            </span>
        </li>
	
	        <li>
            <label>
                IMDB Rating:
            </label>
            <span>
                {{ $movies->rate }}         
            </span>
        </li>
	
	
	</ul>

    
    <a href="{{ route('watchOnline' , $movies->id) }}" class="amy-redirect-watch-online" style="padding: 10px 25px; background: #071a01; color: #fff;">
        <span>
            WatchOnline        
        </span>
    </a>

     @foreach ($movies->trailers as $trailer)
     <a href="{{ $trailer->url }}" class="amy-redirect-watch-online" style="padding: 10px 25px; background: #fe0022; color: #fff;">
        <span>
            Trailer        
        </span>
    </a> 
     @endforeach




   
    <a href="{{ route('download' , $movies->id) }}" class="amy-redirect-watch-online" style="padding: 10px 25px; background: #fe7900; color: #fff;">
        <span>
            Download        
        </span>
    </a>



<div class="entry-action">
	<div class="mrate  no-rate">
					</div>
	<div class="entry-share">
		<label>Share:</label>
		<ul class="amy-social-links clearfix"><li><a href="https://www.facebook.com/sharer.php?u=http://demo.amytheme.com/movie/demo/elementor-watch-online/amy_movie/jumanji-welcome-to-the-jungle/" class="fab fa-facebook" target="_blank"></a></li><li><a href="http://www.twitter.com/share?url=http://demo.amytheme.com/movie/demo/elementor-watch-online/amy_movie/jumanji-welcome-to-the-jungle/" class="fab fa-twitter" target="_blank"></a></li><li><a href="http://pinterest.com/pin/create/button/?url=http://demo.amytheme.com/movie/demo/elementor-watch-online/amy_movie/jumanji-welcome-to-the-jungle/" class="fab fa-pinterest" target="_blank"></a></li></ul>	</div>
	<div class="clearfix"></div>
</div>
			</div>
		</div>
		<div class="clearfix"></div>
		
<div class="entry-content e-content" itemprop="description articleBody">
	<h3 class="info-name amy-title">Story</h3>
	<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, tota</p></div>

    
    <link rel="stylesheet" type="text/css" href="styles.css" />
 

</article>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</body>
</html>