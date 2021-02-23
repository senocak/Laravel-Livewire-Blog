<main class="site-main outer">
    <div class="inner posts">
        <div class="post-feed">
            @forelse ($yazilar as $yazi)
                <article class="@if($yazi->id == $yazilar[0]->id) post-card post post-card-large @else post-card post @endif">
                    <a class="post-card-image-link" href="/yazi/{{$yazi->url}}"><img class="post-card-image" src="/kategoriler/{{ $yazi->kategori->resim }}"></a>
                    <div class="post-card-content post-card-content-link">
                        <header class="post-card-header ">
                            <a class="post-card-content-link" href="/kategori/{{$yazi->kategori->url}}">
                                <div class="post-card-primary-tag">{{$yazi->kategori->baslik}}</div>
                            </a>
                            <a class="post-card-content-link" href="/yazi/{{$yazi->url}}">
                                <h2 class="post-card-title">{{$yazi->baslik}}</h2>
                            </a>
                        </header>
                        <section class="post-card-excerpt">
                            @php ($kelime = 200)
                            @php ($icerik=strip_tags($yazi->icerik))
                            @if (strlen($icerik)>=$kelime)
                                @if (preg_match('/(.*?)\s/i',substr($icerik,$kelime),$dizi))
                                    @php ($icerik=substr($icerik,0,$kelime+strlen($dizi[0]))."...")
                                @endif
                            @else
                                @php ($icerik.="")
                            @endif
                            <p style="text-align: justify;">{!! $icerik !!}</p>
                        </section>
                        <footer class="post-card-meta">
                            <ul class="author-list">
                                <li class="author-list-item">
                                    <div class="author-name-tooltip">Anıl Şenocak</div>
                                    <a class="static-avatar">
                                        <img class="author-profile-image" src="https://avatars2.githubusercontent.com/u/6429176?u=6b7e1e3391a936000751b7bf4b04dc977a0d1ffd&v=4" />
                                    </a>
                                </li>
                            </ul>
                            <div class="post-card-byline-content">
                                <span><a >Anıl Şenocak</a></span>
                                <span class="post-card-byline-date">
                                    <time datetime="2020-06-03">{{$yazi->created_at->diffForHumans()}}</time>
                                    <span class="bull">&bull;</span>
                                    {{count($yazi->yorum)}} Yorum
                                </span>
                            </div>
                        </footer>
                    </div>
                </article>
            @empty
                <article class="post-card-large" style="padding-bottom: initial;min-height: auto;">
                    <center>
                        <h1>Yazı Bulunamadı</h1>
                    </center>
                </article>
            @endforelse
        </div>
        <div class="pagination">
            <ul>
                {{ $yazilar->links("pagination-links")}}
            </ul>
        </div>
    </div>
</main>
