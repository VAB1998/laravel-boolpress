@extends('layouts.app')

@section('content')
    <section id="guests_home">
        <div class="container">
            
                @guest
                    <h2 class="text-center">
                        If you are already registered please
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        , otherwise
                        <a href="{{ route('register') }}">Sign in</a></h2>
                @else
                    <h2 class="text-center">You are already logged in, <a href=" {{ route('admin.home') }} ">Click here</a></h2>
                @endguest

                <h2 class="text-center"> <a href=" {{ route('guests.posts.index') }} ">Go to Posts</a> </h2>
                <h2 class="text-center"> <a href=" {{ route('guests.contactUs') }} ">Go Contact Us</a> </h2>
        </div>
    </section>
@endsection   
