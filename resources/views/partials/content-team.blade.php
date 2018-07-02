<article @php post_class() @endphp>
  <header>
    <div class="container">
    <h1 class="entry-title">{{ get_the_title() }}</h1>
    <p>@php the_content() @endphp</p>
    @include('partials/entry-meta')
    </div>
  </header>
  <div class="entry-content">
    <div class="team container">
      <div class="row justify-content-center">
        @php
          query_posts('post_type=team&order=ASC'); 
          if(have_posts()) : 
          while(have_posts()): the_post(); 
        @endphp
        <div class="col-md-4">
          <h4>{{ the_title() }}</h4>
          <img src="{{ the_post_thumbnail_url('thumbnail') }}" alt="">
          <p>{{ rwmb_meta( 'team_funcao' ) }}</p>
          <p>{{ rwmb_meta( 'team_fone' ) }}</p>
          <p>{{ rwmb_meta( 'team_email' ) }}</p>
        </div>
        @php 
          endwhile; 
          else :
        @endphp
          nenhum registro encontrado...
        @php
          endif; 
          wp_reset_query(); 
        @endphp
      </div>
    </div>
    <br>
    <br>
    <div class="testimonial container">
        @foreach($get_testimonial as $key => $testimonial)
        <div class="item" style="display:table">
          {{-- $testimonial->post_title --}}
          {{-- {!!get_the_post_thumbnail($testimonial->ID,'thumbnail',array( 'class' => 'alignleft' ))!!} --}}
          <img src="{{ wp_get_attachment_image_url( $testimonial->foto, 'thumbnail' ) }}" alt="" class="alignleft">
          <h4>{{ $testimonial->nome }}</h4> <br>
          <p>{{ wp_trim_words( $testimonial->texto, 30, '...' ) }}</p>
          <a href="{{get_permalink( $testimonial->ID )}}">&raquo; leiam mais</a><br>
        </div>
        @endforeach
    </div>
    <br>
    <br>

    <?php
      $args = array(
      'post_type' => 'testimonial',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      ); 
      $carousels = get_posts( $args );
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-2">
        </div>
        <div id="carouselExampleIndicators" class="carousel slide col-md-8" data-ride="carousel">
          <ol class="carousel-indicators">
            @foreach($carousels as $key => $carousel)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ ($key == 0) ? 'active' : ''}}"></li>
            @endforeach
          </ol>

          <div class="carousel-inner">
          @foreach($carousels as $key => $carousel)
            <div class="carousel-item @php if($key == 0): echo 'active'; endif; @endphp">
              <img class="d-block w-100" src="@asset('images/slide/fundo.jpg')" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                <img src="{{ get_the_post_thumbnail_url($carousel->ID,'thumbnail') }}" alt="">
                <h5>{{ $carousel->nome }}</h5>
                <p>{{ wp_trim_words( $carousel  ->texto, 30, '...' ) }}</p>
              </div>
            </div>
          @endforeach

          </div>

          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div> 
        <div class="col-md-2">
        </div>
      </div>
    </div>

  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  @php comments_template('/partials/comments.blade.php') @endphp
</article>
