@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <h1>Посты для блогеров</h1>
        <a href="{{back()->getTargetUrl()}}">
            <button class="btn btn-success" id="submit">Добавить пост</button>
        </a>
        @foreach ($postArr as $post)
            <div class="row justify-content-left">
                <hr>
                <img class="col-md-1" src="{{ asset('images/i.webp') }}" alt="Avatar" height="35" width="35">
                <h4>{{ $post['article'] }}.</h4>
                @if ($userIsAdmin or ($userId == $post['users_id']))
                
                <a href="{{back()->getTargetUrl()}}">
                    <button class="btn btn-primary" id="submit">Загрузить аватар</button>
                </a><a href="{{back()->getTargetUrl()}}">
                    <button class="btn btn-warning" id="submit">Изменить</button>
                </a>
                <a href="{{back()->getTargetUrl()}}">
                    <button class="btn btn-danger" id="submit">Удалить</button>
                </a>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
