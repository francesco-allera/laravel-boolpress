@extends('templates.base')

@section('title', 'Post Creation')

@section('content')

<div class="row">
    <div class="col-12">
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="author_id">author</label>
                <select name="author_id" id="author" class="form-control {{ $errors->has('author_id') ? 'is-invalid' : '' }}">
                    @foreach ($authors as $author)
                    <option value="{{ $author->id }}">
                        {{ $author->detail->first_name }}
                        {{ $author->detail->last_name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="title">title</label>
                <input type="text" name="title" placeholder="insert the title"
                    class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}">
                <div class="invalid-feedback">{{ $errors->first('title') }}</div>
            </div>

            <div class="form-group">
                <label for="text">text</label>
                <textarea name="text" id="text" rows="5" class="form-control {{ $errors->has('text') ? 'is-invalid' : '' }}"></textarea>
                <div class="invalid-feedback">{{ $errors->first('text') }}</div>
            </div>

            <div class="form-group">
                <label for="picture">picture</label>
                <input type="text" name="picture" placeholder="picture url" class="form-control {{ $errors->has('picture') ? 'is-invalid' : '' }}">
                <div class="invalid-feedback">{{ $errors->first('picture') }}</div>
            </div>

{{--             <div class="form-group">
                <label for="tags[]">tags</label>
                <select name="tags[]" id="tags" class="custom-select {{ $errors->has('tags') ? 'is-invalid' : '' }}" multiple>
                    @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">
                        {{ $tag->name }}
                    </option>
                    @endforeach
                </select>
            </div> --}}

            <div class="form-group">
                <label for="picture">picture</label>
                <input type="file" name="picture" id="picture" class="form-control">
            </div>

            <div class="form-group">
                <label for="tags[]">tags:</label>
                @foreach($tags as $tag)
                <br>
                <input type="checkbox" name="tags[]" id="{{ $tag->name }}"
                    class="{{ $errors->has('tags') ? 'is-invalid' : '' }}"
                    value="{{ $tag->id }}">
                {{ $tag->name }}
                @endforeach
                <div class="invalid-feedback">{{ $errors->first('tags') }}</div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Add Post</button>
            </div>
        </form>
    </div>
</div>

@endsection
