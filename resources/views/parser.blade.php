@extends('/layouts.app')

@section('title', 'Главная')

@section('content')

<?php
$str = file_get_contents('http://theory.phphtml.net');
	var_dump($str);
?>


@endsection
