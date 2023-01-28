@extends('templates.base')

@section('title', 'Our Posts')

@section('content')

    <div class="row">

        @foreach ($posts as $post)
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">
            <a href="{{ route('posts.show', compact('post')) }}">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ $post->picture }}" alt="">

                    <div class="card-body">
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->created_at }}</p>
                        <h4>{{ $post->text }}</h4>
                        <p>
                        @foreach($post->tags as $tag)
                            #{{ $tag->name}}
                        @endforeach
                        </p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach

    </div>

@endsection
