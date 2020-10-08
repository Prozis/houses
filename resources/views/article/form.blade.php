@if (Session::has('status'))
	{{ Session::get('status') }}
@endif
<div class="form-group">
    {{ Form::label('title', 'Заголовок') }}
    {{ Form::text('title', null, ['class' => 'form-control']) }}

    {{ Form::label('price', 'Цена') }}
    {{ Form::text('price', null, ['class' => 'form-control']) }}

		{{ Form::label('phone', 'Телефон') }}
    {{ Form::text('phone', null, ['class' => 'form-control']) }}

    {{ Form::label('text', 'Описание') }}
    {{ Form::textarea('text', null, ['class' => 'form-control', 'rows' => '5']) }}
</form>
