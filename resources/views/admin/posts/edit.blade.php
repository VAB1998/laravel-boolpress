@extends('layouts.app')

@section('content')
    <section id="edit_posts">
        <div class="container">
            <a href="{{ route('admin.posts.index') }}">Go Back to the Index</a>

            <form action=" {{ route('admin.posts.update', $post) }} " method="POST">
                {{-- <input type="hidden" name="_token" value="xxdnqiodnqwiowTOKENdqniodqwniox" /> --}}
                @method('PATCH')
                @csrf
                <div class="mb-3">
                    <input class="form-control form-control-lg" type="text" id="title" name="title" placeholder="Title" 
                    value=" {{ $post->title }} " required>       
                </div>

                <div class="mb-3">
                    <input class="form-control form-control-lg" type="text" id="author" name="author" placeholder="Author"
                    value=" {{ $post->author }} ">      
                </div>

                <select class="form-control form-control-lg w-50" name="category_id">
                    <option value="">None</option>
                    @foreach ($categories as $category)
                        <option value=" {{ $category->id }} " @if ( $post->category_id == $category->id ) selected @endif > 
                            {{ $category->name }} 
                        </option>
                    @endforeach
                </select>

                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="tag_{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]"
                        @if ( in_array($tag->id, old("tags", $tagIds ? $tagIds : [] ))) checked @endif >
                        <label class="form-check-label" for="tag_{{ $tag->id }}"> {{ $tag->name }} </label>
                    </div>
                @endforeach
                
                <div class="mb-3">
                    <textarea class="form-control" id="post_content" name="post_content" rows="3" placeholder="Content">{{ $post->post_content }}</textarea>
                </div>
                
                <button type="submit" class="btn btn-success">Submit</button>                        
                <button type="reset" class="btn btn-danger">Reset</button>                        
            </form>
        </div>        
    </section>
@endsection