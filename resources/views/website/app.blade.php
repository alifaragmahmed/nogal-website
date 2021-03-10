@php 
    if (!session("locale"))  {
        session(["locale" => "En"]); 
    }
    
@endphp


@include('website.layouts.header')
@yield('content')
@include('website.layouts.footer')
