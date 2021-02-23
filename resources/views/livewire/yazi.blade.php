<article class="post-full post post-feed outer">
    @if(Session::has('hata'))<p class="post-full-content success" style="min-height: auto;">{{ Session::get('hata') }}</p>@endif
    <img src="/kategoriler/{{ $yazi->kategori->resim }}" style="margin: auto;display: flex;border-radius: 5px;width: 50%;">
    <header class="post-full-header" style="padding: 0px 170px 0px !important;">
        <h1 class="post-full-title">{{$yazi->baslik}}</h1>
        <section class="post-full-tags">
            <a href="/kategori/{{ $yazi->kategori->url }}" style="padding-right: 16px;">{{$yazi->kategori->baslik}}</a> |
            <a href="#yorumlar" style="padding-right: 16px;padding-left: 10px;">{{count($yazi->yorum)}} Onaylanmış Yorum</a>
             <!--|
            <small>
                @foreach(explode(',', $yazi->etiketler) as $info)
                    <span class="badge badge-pill badge-warning" style="padding-left: 10px;">#{{$info}}</span>
                @endforeach
            </small>
            -->
        </section>
    </header>
    <section class="post-full-content" style="text-align: justify;">
        {!! $yazi->icerik !!}
        <hr class="hr">
    </section>
    <header class="post-full-header" style="width: 100%;" id="yorumlar" >
        @if(Session::has('basarı'))<p class="success">{{ Session::get('basarı') }}</p>@endif
        <form method="POST" wire:submit.prevent="yorumEkle('{{$yazi->id}}')">
             @csrf
            <div class="form__group field">
                <input type="email" class="form__field" wire:model.lazy="email" required />
                <label for="name" class="form__label">Email Adresiniz</label>
                @error('email') <p class="alert">{{ $message }}</p> @enderror
            </div>
            <div style="display: contents;" onclick="emoji('❤')">❤</div>
            <div style="display: contents;" onclick="emoji('😊')">😊</div>
            <div style="display: contents;" onclick="emoji('😔')">😔</div>
            <div style="display: contents;" onclick="emoji('😀')">😀</div>
            <div style="display: contents;" onclick="emoji('😍')">😍</div>
            <div style="display: contents;" onclick="emoji('😐')">😐</div>
            <div style="display: contents;" onclick="emoji('🤢')">🤢</div>
            <div style="display: contents;" onclick="emoji('😡')">😡</div>
            <div style="display: contents;" onclick="emoji('🔥')">🔥</div>
            <div style="display: contents;" onclick="emoji('🤘')">🤘</div>
            <script>
                function emoji(e) {
                    const   el      = document.getElementById("yorum_textarea"),
                            start   = el.selectionStart,
                            end     = el.selectionEnd,
                            text    = el.value,
                            before  = text.substring(0, start),
                            after   = text.substring(end, text.length)
                    el.value = (before + e + after)
                    el.selectionStart = el.selectionEnd = start + e.length
                    el.focus()
                }
            </script>
            <div class="form__group field">
                <textarea class="form__field" style="resize:none;" rows="2" maxlength="200" id="yorum_textarea" wire:model.lazy="yorum"></textarea>
                <label for="name" class="form__label">Yorumunuz</label>
                @error('yorum') <p class="alert">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="btn" >Gönder</button>
        </form>
        <br>
        @foreach ($yorumlar as $yorum)
            <div style="padding: initial;" id="yorum_{{$yorum->id}}">
                <img src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-512.png" style="width: 5%; float: left;" alt="yorum.baslik"/>
                <h1 style="font-size: initial;color:white;">{{$yorum->email}}<small> ({{$yorum->created_at->diffForHumans()}})</small></h1>
                <section class="post-full-tags" style="text-transform: initial;">
                    <p style="text-align: justify">{{ trim($yorum->yorum) }}</p>
                </section>
            </div>
        @endforeach
    </header>
</article>
