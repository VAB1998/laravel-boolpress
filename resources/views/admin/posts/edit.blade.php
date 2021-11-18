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
                
                <div class="mb-3">
                    <textarea class="form-control" id="post_content" name="post_content" rows="3" placeholder="Content">{{ $post->post_content }}</textarea>
                </div>
                
                <button type="submit" class="btn btn-success">Submit</button>                        
            </form>
        </div>        
    </section>
@endsection