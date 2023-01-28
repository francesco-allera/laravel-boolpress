@extends('templates.base')

@section('title')
    Post #{{ $post->id }}
@endsection

@section('content')

    <div>
        <h1>{{ $post->title }}</h1>

        <h5>{{ $post->created_at }}</h5>

        <h5>
        @foreach($post->tags as $tag)
            #{{ $tag->name }}
        @endforeach
        </h5>

        <div>
            <img src="{{ $post->picture }}" alt="">
        </div>

        <p>{{ $post->text }}</p>
    </div>

    <hr>

    <div>
        @foreach ($comments as $comment)
        <div class="card mb-4">
            <b>{{ $comment->comment}}</b>
            <h5>{{ $comment->first_name }} {{ $comment->last_name }}</h5>
            <h6 class="align-end">{{ $comment->created_at }}</h6>
        </div>
        @endforeach
    </div>

@endsection
