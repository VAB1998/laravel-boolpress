@extends('layouts.app')

@section('content')
    <section id="show_posts">
        <div class="container p-4">
            <a href="{{ route('admin.posts.index') }}">Go Back to the Index</a>
            <h1> {{ $post->title }} </h1>
            <h5>{{ $post->user->name }} | {{ $post->post_date }}</h5>
            <h6> 
                Category: 
                @if ($post->category)
                <span class="badge badge-primary">{{$post->category->name}}</span>
                @endif
            </h6>
            <h6>
                Tags:
                @foreach ($post->tags as $tag)
                <span class="badge" style="background-color: {{ $tag->color}} ">{{$tag->name}}</span>
                @endforeach 
            </h6>
            
            <p> {{ $post->post_content }} </p>
        </div>
    </section>
@endsection