@extends('layouts.app')

@section('content')
    <section id="index_posts">
        <div class="container">
            <table class="table table-light table-striped table-bordered">
                <thead>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
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
                                {{ $post->author }}
                            </td>
                            <td>
                                {{ $post->post_date }}
                            </td>
                            <td> <a href="#"> <i class="fas fa-pencil-alt"></i> </a> </td>
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
        </div>
    </section>
@endsection