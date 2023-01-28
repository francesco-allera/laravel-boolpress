@php
    if (isset($post)) {
        $route = route('posts.update', compact('post'));
        $method = 'PUT';
        $action = 'edit';
    } else {
        $route = route('posts.store');
        $method = 'POST';
        $action = 'add';
    }
@endphp

<form action="{{ $route }}" method="post">
    @csrf
    @method($method)

    {{-- SELECT AUTHOR ID --}}
    <div class="form-group">
        <label for="author_id">author</label>
        <select name="author_id" id="author"
            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
            value="{{ isset($post) ? $post->name : '' }}">
            @foreach ()
                <option value="{{}}"></option>
            @endforeach
        </select>
        <input type="text" name="name" placeholder="insert the name"
            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
            value="{{ isset($post) ? $post->name : '' }}">
        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
    </div>

    <div class="form-group">
        <label for="title">title</label>
        <input type="text" name="title" placeholder="insert the title"
            class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
            value="{{ isset($post) ? $post->title : '' }}">
        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
    </div>

    <div class="form-group">
        <label for="text">text</label>
        <textarea name="text" id="text" rows="5"
            class="form-control {{ $errors->has('text') ? 'is-invalid' : '' }}">
            {{ isset($post) ? $post->text : '' }}
        </textarea>
        {{-- <input type="text" name="text" placeholder="insert the text"
            class="form-control {{ $errors->has('text') ? 'is-invalid' : '' }}"
            value="{{ isset($post) ? $post->text : '' }}"> --}}
        <div class="invalid-feedback">{{ $errors->first('text') }}</div>
    </div>

    <div class="form-group">
        <label for="picture">picture</label>
        <input type="text" name="picture" placeholder="insert the picture"
            class="form-control {{ $errors->has('picture') ? 'is-invalid' : '' }}"
            value="{{ isset($post) ? $post->picture : '' }}">
        <div class="invalid-feedback">{{ $errors->first('picture') }}</div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">{{ $action }} Post</button>
    </div>
</form>
