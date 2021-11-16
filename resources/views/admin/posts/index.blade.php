@extends('layouts.app')

@section('content')
    <section id="index_posts">
        <div class="container">
            <table class="table table-light table-striped table-bordered">
                <thead>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Publication date</th>
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
                        </tr>
                    @empty
                        <tr>
                            <td>
                                No Article found
                            </td>
                        </tr>
                    @endforelse
                    
                </tbody>
            </table>

            <a class="btn btn-primary" href=" {{ route('admin.posts.create') }} ">Add a new Post</a>
        </div>
    </section>
@endsection