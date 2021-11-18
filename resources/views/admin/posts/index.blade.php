@extends('layouts.app')

@section('content')
    <section id="index_posts">
        <div class="container">
            @if (session('deleted_title'))
            <div class="alert alert-info" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('alert_message') }}
            </div>

            @endif
            <table class="table table-light table-striped table-bordered">
                <thead>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Publication date</th>
                    <th scope="col"></th>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td>
                                <a href=" {{ route('admin.posts.show', $post) }} "> {{ $post->title }} </a>
                            </td>
                            <td>
                                {{ $post->author }}
                            </td>
                            <td>
                                {{ $post->post_date }}
                            </td>
                            <td>
                                {{-- Update --}}
                                <a href=" {{ route('admin.posts.edit', $post) }} "> Edit</a>
                            </td>
                            {{-- Delete --}}
                            <td>
                                <form action="{{route('admin.posts.destroy', $post )}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn" type="submit">Delete</a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>
                                No Post found
                            </td>
                        </tr>
                    @endforelse
                    
                </tbody>
            </table>
            {{-- Create --}}
            <a class="btn btn-primary" href=" {{ route('admin.posts.create') }} ">Add a new Post</a>
        </div>
    </section>
@endsection