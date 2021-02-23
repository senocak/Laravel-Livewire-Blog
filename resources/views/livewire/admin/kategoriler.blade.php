<main class="outer">
    @if (session()->has('message'))<p class="alert">{{ session('message') }}</p>@endif
    <form wire:submit.prevent="ekle">
        @csrf
        <img style="margin: 20px auto;" width="200px" src="@if($image) {{ $image->temporaryUrl() }} @else /img/no-image.png @endif">
        <span class="form__group field control-fileupload">
            <label for="file1" class="text-left">Kategori için resim seçin.</label>
            <input type="file" wire:model="image" required class="form__field">
            @error('image') <p class="alert">{{ $message }}</p> @enderror
        </span>
        <div class="form__group field">
            {!! Form::text("baslik", null,["wire:model.lazy"=>"baslik","class"=>"form__field", "required" ]) !!}
            <label for="baslik" class="form__label">Başlık</label>
            @error('baslik') <p class="alert">{{ $message }}</p> @enderror
        </div>
        <br>
        {!! Form::submit("Ekle", ["class"=>"btn"]) !!}
    </form>
    <div class="post-feed">
        <div style="width: 100%;">
            <div style="width: 20%; float: right">
                <div class="form__group field">
                    <input type="text" class="form__field" wire:model="ara"/>
                    <label for="baslik" class="form__label">Kategori Ara</label>
                </div>
            </div>
        </div>
        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Başlık</th>
                <th>Resim</th>
                <th>İşlemler</th>
            </tr>
            <thead>
                <tbody id="sortable">
                    @php($sira = 1)
                    @forelse ($kategoriler as $item)
                        <tr id="item-{{ $item->id }}">
                            <td class="sortable">{{$sira}}</td>
                            <td>{{$item->baslik}}</td>
                            <td><img src="/kategoriler/{{$item->resim}}" width="200px"></td>
                            <td>
                                <a href="/admin/kategoriler/duzenle/{{$item->url}}" title="Düzenle" style="color: white"><i class="fa fa-edit"></i></a>
                                <a wire:click="sil({{$item->id}})" title="Sil" onclick="return confirm('Silmek İstediğinize Emin Misiniz?!')" style="color: white"><i class="fa fa-minus-circle"></i></a>
                            </td>
                        </tr>
                        @php($sira++)
                    @empty
                        <tr>Kayıt Yok</tr>
                    @endforelse
                </tbody>
            </thead>
        </table>
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
