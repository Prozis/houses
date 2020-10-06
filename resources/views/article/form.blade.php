@if (Session::has('status'))
	{{ Session::get('status') }}
@endif
<div class="form-group">
    {{ Form::label('title', 'Заголовок') }}
    {{ Form::text('title') }}

    {{ Form::label('price', 'Цена') }}
    {{ Form::text('price') }}

    {{ Form::label('text', 'Описание') }}
    {{ Form::textarea('text') }}
</form>
