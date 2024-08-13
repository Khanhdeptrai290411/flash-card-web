<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&family=Ubuntu:wght@400;500&display=swap');





.container2 {
  position: relative;
  width: 650px;
  max-width: 100%;
  overflow: hidden;
  padding: 2rem;
  border: 4px solid #fff;
  border-radius: 1rem;
  box-sizing: 25px 25px rgba(255,255,255,1);
  background: rgba(255, 255, 255, 0.2);
  box-shadow:15px 15px 20px rgba(0, 0, 0, 0.3); 
  transition: all .5s ease-in-out;
  
}

.container2:hover {
  box-shadow: 15px 15px 20px rgba(255,255,255,.6);

}

.container2 h2 {
  font-size: 1.6rem;
  margin-bottom: 2rem;
  text-align: center; /* Thêm dòng này */
}

.container2 ul {
  margin-bottom: 2.5rem;
}
.container2 ul li{
  position: relative;
  height: 2.5rem;
  font-size: 1.2rem;
  font-weight: bold;
  margin-bottom: 0.6rem;
}

.container2 input[type="radio"] {
  width: 20px;
  height: 20px;
  opacity: 0;
}

.container2 ul label {
  padding-left: 1rem;
  cursor: pointer;
}

.container2 ul svg {
  position: absolute;
  left: 2px;
  top: 3px;
  border: 2px solid rgb(24, 255, 3);
  border-radius: 2px;
}

.container2 ul svg .tick {
  fill: none;
  stroke: rgb(60, 255, 0);
  stroke-width: 3px;
  stroke-linecap: round;
  stroke-linejoin: round;
  stroke-dasharray: 20;
  stroke-dashoffset: 21;
}

.container2 li input[type="radio"]:checked+ label+ svg .tick {
  animation: tick 1s ease-in-out;
  animation-fill-mode: forwards;
}

@keyframes tick {
  from {
    stroke-dashoffset: 21;
  }
  to {
    stroke-dashoffset: 0;
  }
}


/* prevBtn and nextBtn */
.container2 .prev, .next {
  position: absolute;
  bottom: 1rem;
  width: 5rem;
  height: 3rem;
  cursor: pointer;
  margin-bottom: 1rem;
}
.container2 .prev {
  right: 7rem;
}
.container2 .next {
  right:1rem;
}

.container2 .nextline,.prevline {
  fill: none;
  stroke: #000;
  stroke-width: 4px;
  stroke-linecap: round;
  stroke-linejoin: round;
  cursor: pointer;
  transition: stroke .5s ease-in-out;
}

.container2 .next:hover .nextline {
  stroke-dasharray: 100;
  stroke-dashoffset: 60 ;
  stroke:  rgb(60, 255, 0);
  animation: next .6s ease-in-out;
  animation-fill-mode: forwards;
}
@keyframes next {
  from{
    stroke-dashoffset: 60;
  }
  to {
    stroke-dashoffset: 0;
  }
}

.container2 .prev:hover .prevline {
  stroke-dasharray: 100;
  stroke-dashoffset: 60 ;
  stroke:  rgb(60, 255, 0);
  animation: prev .6s ease-in-out;
  animation-fill-mode: forwards;
}
@keyframes prev {
  from{
    stroke-dashoffset: 60;
  }
  to {
    stroke-dashoffset: 0;
  }
}


.container2 .correct_answer{
  position: absolute;
  left: 2rem;
  bottom: 2rem;
  width: 10rem;
  height: 2rem;
  font-size: 1rem;
  font-weight: bold;
  line-height: 2rem;
  background:#000;
  border-radius: 10px;
  text-align: center;
  color:#fff;
  cursor: pointer;
  transition: all.8s ease-in-out;
}



    </style>


<x-app-layout > 


    <div class="container-fluid" >
        @yield('random')
    </div>




    <footer class="site-footer" >
        @include('layout.footer')
</footer>
</x-app-layout>
</body>
</html>