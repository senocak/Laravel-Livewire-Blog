<main class="post-full-content post-feed">
    {!! Html::style('css/bootstrap-tagsinput.css') !!}
    {!! Html::script('https://cdn.ckeditor.com/4.12.1/full-all/ckeditor.js') !!}
    {!! Html::style('/css/editor/editor.css') !!}
    {!! Html::style('/css/editor/dialog.css') !!}
    <form wire:submit.prevent="submit">
        @csrf
        <div class="form__group field">
            {!! Form::text("baslik", null,["wire:model.lazy"=>"baslik","class"=>"form__field" ]) !!}
            <label for="baslik" class="form__label">Başlık</label>
            @error('baslik') <p class="alert">{{ $message }}</p> @enderror
        </div>
        <div class="form__group field" wire:ignore>
            {!! Form::textarea("icerik", null, ["id"=>"editor1", "wire:model.lazy"=>"icerik"]) !!}
            @error('icerik') <p class="alert">{{ $message }}</p> @enderror
        </div>

        <div class="form__group field">
            {!! Form::select("kategori_id", $kategoriler, null, ['class'=>'form__field', "required"=>"required", "style"=>"background: #191b1f;", "wire:model"=>"kategori_id"]) !!}
            @error('kategori_id') <span class="alert alert-danger" style="padding:3px">{{ $message }}</span>@enderror
        </div>

        <div class="form__group field">
            {{Form::checkbox('aktif',null,null, array('class'=>'', "wire:model"=>"aktif")) }}
            {!! Form::label("aktif", "Yayınla", []) !!}
        </div>
        <br>
        {!! Form::submit("Kaydet", ["class"=>"btn"]) !!}
    </form>
    {!! Html::script('js/bootstrap-tagsinput.min.js') !!}
    <script>
        CKEDITOR.replace('editor1', {
            filebrowserBrowseUrl: "{{url('/')}}/fileman/index.html",
            filebrowserImageBrowseUrl: "{{url('/')}}/fileman/index.html",
            extraPlugins: 'codesnippet',
            height: '400px'
        }).on('change', function(e){
        @this.set('icerik', e.editor.getData())
        })
    </script>
</main>

