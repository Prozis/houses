@if (Session::has('status'))
	{{ Session::get('status') }}
@endif
<div class="form-group">
    {{ Form::label('title', 'Заголовок') }}
    {{ Form::text('title') }}

    {{ Form::label('price', 'Цена') }}
    {{ Form::text('price') }}

		{{ Form::label('area', 'Площадь') }}
    {{ Form::text('area') }}

		{{ Form::label('bigImage', 'Ссылка на фото') }}
    {{ Form::text('bigImage') }}

    {{ Form::label('text', 'Описание') }}
    {{ Form::textarea('text') }}
</form>
