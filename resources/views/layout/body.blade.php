<!DOCTYPE html>
<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="{{ asset('css4.css') }}" rel="stylesheet">
    <link href="{{ asset('css3.css') }}" rel="stylesheet">
    <!-- Thêm tệp CSS của Font Awesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
    <x-app-layout>
        {{-- <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                hi {{ Auth::user()->role }}
                <h5><a href="{{ route('quizz.create') }}">Product</a></h5>
            </h2>
        </x-slot> --}}

   
                <main>
                    @include('layout.left')
                </div>
  
                <div class="rightcolumn">
                    @include('layout.right')
                </div>
                
    </x-app-layout>


</body>
