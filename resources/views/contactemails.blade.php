<!DOCTYPE html>  
<html>  
<head>  
    <title>New message</title>  
</head>  
<body>  
    <h2>You have received a new message from this contact:</h2>
    <p><strong>Name:</strong> {{ $data ['name'] }}</p>  
    <p><strong>Email:</strong> {{ $data ['email'] }}</p>  
    <p><strong>About:</strong> {{ $data ['subject'] }}</p> 
    <p><strong>About:</strong> {{ $data ['message'] }}</p> 
    {{-- <p><strong>Message:</strong> <br> {!! nl2br($data['message']) !!}</p>
    <iframe src="{{}}" frameborder="0"></iframe>   --}}

</body>  
</html>