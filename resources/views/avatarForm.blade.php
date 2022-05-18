@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('uploadAvatar', ['userId' => $userId]) }}" class="my-4"
          enctype="multipart/form-data" method="POST">
    @csrf
    <label for="avatar">Загрузить аватар</label>
    <input type="file" name="avatar" id="avatar">
    <input type="submit" class="btn btn-primary" value="Загрузить">
    </form>
</div>
@endsection