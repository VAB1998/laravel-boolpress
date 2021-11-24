@extends('layouts.app')

@section('content')
    <section id="guests_posts">
        <div class="container">
            <a href="{{ route('guests.home') }}">Go to the Home</a>
            <div id="root">
                
            </div>
        </div>
    </section>

    <script src="{{ asset('js/front.js')}}"></script>
@endsection   