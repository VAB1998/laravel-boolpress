<header>
    <h3>Mail sent by {{$contactUsMail->name}} </h3>
    <h3>Address: {{ $contactUsMail->address }}</h3>
    <h3>Subject: {{$contactUsMail->subject}} </h3>
</header>

<body>
    <p>{{$contactUsMail->message}}</p>
</body>