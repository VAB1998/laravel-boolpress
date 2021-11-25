@extends('layouts.app')

@section('content')
    <section id="guests_contact_us">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>        
            @endif
            <a href="{{ route('guests.home') }}">Go to the Home</a>
            <form action=" {{ route('guests.contactUs.send') }} " method="POST">

                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control form-control-lg" type="text" 
                    placeholder="Enter your name" id="name" name="name" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input class="form-control form-control-lg" type="text" 
                    placeholder="Enter your subject" id="subject" name="subject" value="{{ old('subject') }}">
                </div>

                <div class="form-group">
                    <label for="address">Email Address</label>
                    <input class="form-control form-control-lg" type="text" 
                    placeholder="Enter your Email address" id="address" name="address" value="{{ old('address') }}">
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea  class="form-control" type="textarea" placeholder="Enter the message" id="message" name="message" >{{old('message') }} </textarea>
                </div>

                <button type="submit" class="btn btn-success">Send</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </section>
@endsection   