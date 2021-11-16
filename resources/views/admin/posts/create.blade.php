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

                {{-- <div class="mb-3">
                    <input class="form-control form-control-lg" type="text" id="post_date" name="post_date" placeholder="Date : yyyy-mm--dd">      
                </div> --}}
                
                <div class="mb-3">
                    <textarea class="form-control" id="post_content" name="post_content" rows="3" placeholder="Content"></textarea>
                </div>
                
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-success">Submit</button>                        
            </form>
        </div>          
    </section>
@endsection