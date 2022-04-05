@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h4>{{Auth::user()->name}}</h4>
        <h1>Blog Name</h1>
        <p class='create'>[<a href='/posts/create'>投稿</a>]</p>
        <!--<div>-->
        <!--    @foreach($questions as $question)-->
        <!--        <div>-->
        <!--            <a href="https://teratail.com/questions/{{ $question['id'] }}">-->
        <!--                {{ $question['title'] }}-->
        <!--            </a>-->
        <!--        </div>-->
        <!--    @endforeach-->
        <!--</div>-->
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <a href='/posts/{{ $post->id }}'><h2 class='title'>{{ $post->title }}</h2></a>
                    <p class='body'>{{ $post->body }}</p>
                    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                    <p class='delete'><button onclick="return deletePost(this);">削除</button></p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        
        <script>
            function deletePost(e){
                'use strict'
                if (confirm('削除すると復元できません. \n本当に削除しますか? ')){
                    document.getElementById('form_delete').submit();
                }
            }
        </script>
    </body>
</html>
@endsection