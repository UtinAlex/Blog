@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('update', ['postId' => $post->id]) }}" class="my-4"
          enctype="multipart/form-data" method="POST">
    @method('PUT')     
    @csrf
    
    <label for="textpost">Измените текст поста</label>
    <input type="text" name="textpost" id="textpost" value="{{ $post->article }}">
    <label forcheckbox="visibility">Видимость</label>
    <input type="checkbox" name="visibility" id="visibility" value="1">
    <input type="submit" class="btn btn-primary" value="Изменить пост">
    </form>
</div>
@endsection