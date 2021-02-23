<ul class="nav">
    @foreach($kategoriler as $kategori)
        <li class="nav-{{$kategori->url}}"><a  href="/kategori/{{$kategori->url}}">{{$kategori->baslik}}</a></li>
    @endforeach
</ul>
