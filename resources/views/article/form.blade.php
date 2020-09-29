@if (Session::has('status'))
	{{ Session::get('status') }}
@endif
<div class="form-group">
    {{ Form::label('name', 'Заголовок') }}
    {{ Form::text('name') }}

    {{ Form::label('price', 'Цена') }}
    {{ Form::text('price') }}

    {{ Form::label('body', 'Описание') }}
    {{ Form::textarea('body') }}
</form>
