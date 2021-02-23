<main class="outer">
    <form wire:submit.prevent="submit">
        @csrf
        <img src="/kategoriler/{{$image}}" width="200" />
        <img style="margin: 20px auto;" width="200" src=@if($imageYeni) {{ $imageYeni->temporaryUrl() }} @else /img/no-image.png @endif>
        <span class="form__group field control-fileupload">
            <label for="file1" class="text-left">Kategori için resim seçin.</label>
            <input type="file" wire:model="imageYeni" class="form__field">
            @error('imageYeni') <p class="alert">{{ $message }}</p> @enderror
        </span>
        <div class="form__group field">
            {!! Form::text("baslik", null,["wire:model.lazy"=>"baslik","class"=>"form__field" ]) !!}
            <label for="baslik" class="form__label">Başlık</label>
            @error('baslik') <p class="alert">{{ $message }}</p> @enderror
        </div>
        <br>
        {!! Form::submit("Kaydet", ["class"=>"btn"]) !!}
    </form>
</main>
