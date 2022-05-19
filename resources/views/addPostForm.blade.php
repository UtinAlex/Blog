@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('store', ['userId' => $userId]) }}" class="my-4"
          enctype="multipart/form-data" method="POST">
    @csrf
    <label for="textpost">Введите текст поста</label>
    <input type="text" name="textpost" id="textpost">
    <label for="visibility">Видимость</label>
    <input type="checkbox" name="visibility" id="visibility" value="1">
    <input type="submit" class="btn btn-primary" value="Добавить пост">
    </form>
</div>
@endsection