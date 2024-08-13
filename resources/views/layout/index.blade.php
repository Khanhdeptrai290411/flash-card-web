<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('t.css') }}" rel="stylesheet">
    <link href="{{ asset('styleCreate.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Thêm tệp CSS của Font Awesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>




<style>
    .container{
        margin-bottom:10px;
        
    }
.carousel-inner>.carousel-item>img {
    width: 50%;
    margin: 10px;
    display: block; /* Thêm hiển thị là block để căn giữa */

}

.flip-card {
    background-color: transparent;
    width: 100%;
    height: 100%;
    perspective: 1000px;
    margin-right: auto; /* Căn giữa theo chiều ngang */
    margin-left: auto; /* Căn giữa theo chiều ngang */
    margin-top: 30px;
    display: flex;

}

.flip-card-inner {
    position: relative;
    width: 100%; /* Thay đổi kích thước theo chiều ngang */
    height: 500px;
    text-align: center;
    transition: transform 0.6s;
    transform-style: preserve-3d;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    transform-style: preserve-3d;
    cursor: pointer;
    
}

.flip-card.flipped .flip-card-inner {
    transform: rotateY(180deg);
}

.flip-card-front,
.flip-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
   
}

.flip-card-front {
    background-color: #ccc;
    color: rgb(0, 0, 0);
}

.flip-card-back {
    background-color: #2e3856;
    color: rgb(29, 24, 24);
    transform: rotateY(180deg);
}

span {
    font-weight: 600;
    font-size: 4rem;
}

input {}

.item2 {
    max-width: 60%;
    margin: 0 auto; /* Căn giữa theo chiều ngang */
}

body {
    background-color: #0c0e141a;
}

.tag-container {
    background-color: #ffffff;  
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    border-radius:10px;
}

.inputContainer {
    background-color: #ffffff;
}

.tag-container .head_toolbar {
    border-bottom: 1px solid rgb(0, 0, 0);
}

.album-label {
    color: white !important;
}

.quiz-button,
.edit-button {
    display: inline-block;
    padding: 10px 20px;
    border-radius: 4px;
    border: none;
    cursor: pointer;
    margin: 20px;
}

.quiz-button {
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
}

.edit-button {
    background-color: #008CBA;
    color: white;
    text-decoration: none;
}

.site-footer .social-icons a {
    background-color: #2b2d37;
}

h2 {
    font-family: 'Your Preferred Font', sans-serif;
    color: #333;
    border-radius: 5px;
    text-align: center;
    font-weight: 700 !important;
    font-size: 30px !important;
}

</style>

<body>
    <x-app-layout > 

                <div class="container-fluid" >
                    @yield('index')
                </div>
  
         
            
                <footer class="site-footer" >
                    @include('layout.footer')
            </footer>
    </x-app-layout>

    
</body>


</html>

