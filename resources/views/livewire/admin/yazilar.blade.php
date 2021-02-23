<main class="outer">
    @if (session()->has('message'))
        <p class="alert">{{ session('message') }}</p>
    @endif
    <div class="post-feed">
        <div style="width: 100%;">
            <div style="float: left;width: 10%;">
                <a class="btn" href="/admin/yazilar/ekle">Yeni Ekle</a>
            </div>
            <div style="width: 10%; float: right">
                <div class="form__group field">
                    <select class="form__field" style="background: #191b1f;" wire:model="kategori_id">
                        <option value="" selected>Hepsi</option>
                        @foreach($kategoriler as $kategori)
                            <option value="{{$kategori->id}}">{{$kategori->baslik}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div style="width: 10%; float: right">
                <div class="form__group field">
                    <select class="form__field" wire:model="limit">
                        <option value="" disabled selected style="background: black;">Kayıt Göster</option>
                        <option value="10" style="background: black;">10</option>
                        <option value="20" style="background: black;">20</option>
                        <option value="50" style="background: black;">50</option>
                    </select>
                </div>
            </div>
            <div style="width: 20%; float: right">
                <div class="form__group field">
                    <input type="text" class="form__field" wire:model.lazy="ara"/>
                    <label for="baslik" class="form__label">Yazı Ara</label>
                </div>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Başlık</th>
                    <th>Kategori</th>
                    <th>Yorum</th>
                    <th>İşlemler</th>
                </tr>
            <thead>
                <tbody id="sortable">
                    @php($sira = 1)
                    @forelse ($yazilar as $item)
                        <tr id="item-{{ $item->id }}">
                            <td class="sortable">{{$sira}}</td>
                            <td @if($item->aktif == 0) style="text-decoration: line-through"@endif>{{$item->baslik}}</td>
                            <td><a href="/admin/kategoriler/duzenle/{{$item->kategori->url}}" class="btn-1" style="text-decoration: none;">{{$item->kategori->baslik}}</a></td>
                            <td>{{count($item->yorum)}} Onaylı Yorum</td>
                            <td>
                                <a href="/admin/yazilar/duzenle/{{$item->url}}" title="Düzenle" style="color: white"><i class="fa fa-edit"></i></a>
                                <a wire:click="sil({{$item->id}})" title="Sil" onclick="return confirm('Silmek İstediğinize Emin Misiniz?!')" style="color: white"><i class="fa fa-minus-circle"></i></a>
                            </td>
                        </tr>
                        @php($sira++)
                    @empty
                        <tr>
                            <td>#</td>
                            <td>Kayıt Yok</td>
                            <td>Kayıt Yok</td>
                            <td>Kayıt Yok</td>
                            <td>#</td>
                        </tr>
                    @endforelse

                </tbody>
            </thead>
        </table>
        <div class="pagination">
            <ul>
                {{ $yazilar->links("pagination-links") }}
            </ul>
        </div>
    </div>
    <script>
        $(function() {
            $( "#sortable" ).sortable({
                revert: true,
                handle: ".sortable",
                stop: function (event, ui) {
                    var data = $(this).sortable('serialize');
                    @this.call('sirala', data)
                }
            });
        });
    </script>
</main>
