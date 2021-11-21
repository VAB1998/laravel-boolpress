@extends('layouts.app')

@section('content')
    <section id="create_posts">
        <div class="container">
            <a href="{{ route('admin.posts.index') }}">Go Back to the Index</a>

            <form action=" {{ route('admin.posts.store') }} " method="POST">
                {{-- <input type="hidden" name="_token" value="xxdnqiodnqwiowTOKENdqniodqwniox" /> --}}
                @csrf
                <div class="mb-3">
                    <input class="form-control form-control-lg" type="text" id="title" name="title" placeholder="Title" required>       
                </div>

                <div class="mb-3">
                    <input class="form-control form-control-lg" type="text" id="author" name="author" placeholder="Author">      
                </div>
                <div class="mb-3">
                    <select class="form-control form-control-lg w-50" name="category_id">
                        <option value="">None</option>
                        @foreach ($categories as $category)
                            <option value=" {{ $category->id }} "> {{ $category->name }} </option>
                        @endforeach
                    </select>
                </div>

                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="tag_{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]">
                        <label class="form-check-label" for="tag_{{ $tag->id }}"> {{ $tag->name }} </label>
                    </div>
                @endforeach
                
                <div class="mb-3">
                    <textarea class="form-control" id="post_content" name="post_content" rows="3" placeholder="Content"></textarea>
                </div>
                
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-success">Submit</button>                        
            </form>
        </div>          
    </section>
@endsection