@extends('layouts.app')

@section('content')
    <section id="create_posts">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>        
            @endif

            <a href="{{ route('admin.posts.index') }}">Go Back to the Index</a>

            <form action=" {{ route('admin.posts.store') }} " method="POST">
                {{-- <input type="hidden" name="_token" value="xxdnqiodnqwiowTOKENdqniodqwniox" /> --}}
                @csrf
                <div class="mb-3">
                    <input class="form-control form-control-lg" type="text" id="title" name="title" placeholder="Title"
                    value="{{ old('title', $post->title) }}" >       
                </div>

                {{-- <div class="mb-3">
                    <input class="form-control form-control-lg" type="text" id="user_id" name="user_id" placeholder="user_id"
                    value="{{ old('user_id', $post->user_id) }}" >      
                </div> --}}
                <div class="mb-3">
                    <select class="form-control form-control-lg w-50" name="category_id">
                        <option value="">None</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected @endif> 
                                {{ $category->name }} 
                            </option>
                        @endforeach
                    </select>
                </div>

                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="tag_{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]"
                        @if ( in_array($tag->id, old("tags", $tagIds ? $tagIds : [] ))) checked @endif >
                        <label class="form-check-label" for="tag_{{ $tag->id }}"> {{ $tag->name }} </label>
                    </div>
                @endforeach
                
                <div class="mb-3">
                    <textarea class="form-control" id="post_content" name="post_content" rows="3" placeholder="Content">{{ old('post_content', $post->post_content) }}</textarea>
                </div>
                
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-success">Submit</button>                        
            </form>
        </div>          
    </section>
@endsection