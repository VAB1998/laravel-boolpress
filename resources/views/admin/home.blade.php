@extends('layouts.app')

@section('content')
    <section id="admin_home">
        <h2 class="text-center">
            <a class="text-center" href=" {{ route('admin.posts.index') }} ">Go to the posts</a>
        </h2>
    </section>
@endsection