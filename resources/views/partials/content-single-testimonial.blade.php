<article @php post_class() @endphp>
    <header>
      <h1 class="entry-title">{{ rwmb_meta( 'nome' ) }}</h1>
      @include('partials/entry-meta')
    </header>
    <img src="{{ the_post_thumbnail_url('full') }}" alt="">
    @php $imgMB = rwmb_meta( 'foto', array( 'size' => 'thumbnail' ) ) @endphp
    <a href="{{ $imgMB['full_url'] }}"><img src="{{ $imgMB['url'] }}" alt=""></a>
    <div class="entry-content">
      {{ rwmb_meta( 'texto' ) }}
    </div>
    <footer>
      {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
    </footer>
    @php comments_template('/partials/comments.blade.php') @endphp
  </article>
  
