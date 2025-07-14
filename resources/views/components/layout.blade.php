<!DOCTYPE html>
<html>
<head>
   <title>{{$title ?? 'Europa | Find and list jobs'}}</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100">
    <x-header />
    @if (request()->is('/'))
        <x-hero/> 
        <x-top-banner/>   
    @endif
    
    <main class="container p-4 mt-4 mx-auto">
        {{-- Display alert messages --}}
        @if(session('success'))
        <x-alert type="success" message="{{session('success')}}" />
        @endif
        @if(session('error'))
        <x-alert type="error" message="{{session('error')}}" />
        @endif
         {{$slot}}  
    </main>


   
</body>
<script src={{asset('js/script.js')}}></script>
</html>