# Xin Chào bạn có liên hệ từ khách hàng
<p>
    Name: {{$data['name']}}
</p>
<p>
    Email: {{$data['email']}}
</p>
<p>
    Phone: {{$data['phone']}}
</p>
<p>
    Subject: {{$data['subject']}}
</p>
<p>
    Message: {{$data['message']}}
</p>

<x-mail::button :url="'http://127.0.0.1:8000/home'">
    Visit us
</x-mail::button>