<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1>Blog Name</h1>
        <p class='edit'>[<a href='/posts/{{ $post->id }}/edit'>更新</a>]</p>
        <form action="/posts/{{ $post->id }}" id="form_delete" method="post">
            {{ csrf_field() }}
            {{ method_field('delete')}}
            <input type="submit" style="display:none">
            <p class='delete'>[<span onclick="return deletePost(this);">削除</span>]</p>
        </form>
        <div class='post'>
            <h2 class='title'>{{ $post->title }}</h2>
            <p clas='body'>{{ $post->body }}</p>
            <p class='updated_at'>{{ $post->updated_at }}</p>
        </div>
        <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
        <div class="back">[<a href="/">back</a>]</div>
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