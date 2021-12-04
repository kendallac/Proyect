<div class="form-group">
    {!! Form::label('name', 'nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'ingrese el nombre del Post ', 'autocomplete' => 'off']) !!}
    @error('name')
        <small class="text-danger">{{ $message }} </small>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('slug', 'slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder', 'readonly' => 'ingrese el nombre del Slug ']) !!}
    @error('slug')
        <small class="text-danger">{{ $message }} </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('category_id', 'categoria') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
    @error('category_id')
        <small class="text-danger">{{ $message }} </small>
    @enderror
</div>
<div class="form-group">
    <p class="font-weight-bold">
        etiqueta
    </p>
    @foreach ($tags as $tag)
        <label class="mr-4">
            {!! Form::checkbox('tags', $tag->id, null) !!}
            {{ $tag->name }}
        </label>


    @endforeach
    <br>
    @error('tags')
        <small class="text-danger">{{ $message }} </small>
    @enderror



</div>
<div class="form-group">
    <p class="font-weight-bold">
        estado
    </p>

    <label>
        {!! Form::radio('status', 1, true) !!}
        Borrador
    </label>
    <label>
        {!! Form::radio('status', 2) !!}
        Publicado
    </label>
    <hr>
</div>

<div class="row mb-4">

    <div class="col">
        <div class="image-wrapper">
            @isset ($post->image)
            
            <img id="picture"src="{{Storage::url($post->image->url)}}" alt="">
                
            @else
            <img id="picture"
            src="https://images.pexels.com/photos/3970330/pexels-photo-3970330.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
            alt="">
            @endisset
            

        </div>
    </div>
    <div class="col">
        <div class="form-group">

            {!! Form::label('file', 'imagen que se mostrara en el post') !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
            @error('file')
                <small class="text-danger">{{ $message }} </small>
            @enderror
        </div>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem aut, voluptas, accusantium quidem
            quis quibusdam cumque harum pariatur quas, suscipit repellat cum vel eos vitae alias sed quod
            incidunt consectetur?</p>

    </div>
</div>

<div class="form-group">
    {!! Form::label('extract', 'extracto') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
    @error('extract')
        <small class="text-danger">{{ $message }} </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('body', 'informacion del post') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    @error('body')
        <small class="text-danger">{{ $message }} </small>
    @enderror
</div>
@section('css')
    <style>
        .image-wrapper {

            position: relative;
            padding-bottom: 56.25%
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;

        }

    </style>
@endsection

@section('js')

    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
            .create(document.querySelector('#extract'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });

        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script>
@endsection
