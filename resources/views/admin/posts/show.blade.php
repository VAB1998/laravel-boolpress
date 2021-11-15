@extends('layouts.app')

@section('content')
    <section id="show_posts">
        <div class="container p-4">
            <h1> {{ $post->title }} </h1>
            <h5>{{ $post->author }} | {{ $post->post_date }}</h5>
            <p> {{ $post->post_content }} </p>
        </div>
    </section>
@endsection