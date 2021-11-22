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
                    <th scope="col">Category</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Publication date</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td>
                                <a href=" {{ route('admin.posts.show', $post) }} "> {{ $post->title }} </a>
                            </td>
                            <td>
                                {{ $post->user->name }}
                            </td>
                            <td>
                                @if ($post->category) 
                                    <span class="badge badge-primary px-4">{{ $post->category->name }} </span>
                                @else 
                                    Uncategorized post 
                                @endif 
                            </td>
                            <td>
                                @forelse ($post->tags as $tag)
                                    <span class="badge" style="background-color: {{ $tag->color}} ">{{$tag->name}}</span>
                                @empty
                                    Post with no tags.
                                @endforelse
                            </td>
                            <td>
                                {{ $post->post_date }}
                            </td>
                            {{-- Update --}}
                            <td class="text-center">
                                <a class="btn btn-success" href=" {{ route('admin.posts.edit', $post) }} "> Edit</a>
                            </td>
                            {{-- Delete --}}
                            <td class="text-center">
                                <form action="{{route('admin.posts.destroy', $post )}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</a>
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