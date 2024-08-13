@extends('layout.index')
@section('index')
<div class="container">
    <h2>{{ $course->title }}</h2>
    <br>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel"  data-bs-interval="false">
    <div class="carousel-indicators">
        @forelse ($course->quizzes as $key => $quizz)
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}"  class="{{ $key === 0 ? 'active' : '' }}" ></button>
       @empty
        @endforelse
      </div>
        

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @forelse ($course->quizzes as $key => $quizz)
                <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                    <div class="flip-card" style="float: left;">
                        <div class="flip-card-inner" onclick="this.parentElement.classList.toggle('flipped')">
                            <div class="flip-card-front">
                                <span>{{ $quizz->definition }}</span>
                                @if ($quizz->image)
                                    <!-- <img class="album-image" src="{{ URL::to('storage/' . $quizz->image) }}"> -->
                                @endif
                            </div>
                            <div class="flip-card-back">
                                <span>{{ $quizz->mota }}</span>
                                @if ($quizz->image)
                                    <img class="album-image" src="{{ URL::to('storage/' . $quizz->image) }}">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Handle case where there are no quizzes -->
            @endforelse
        </div>

        <!-- Left and right controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
    </div>
</div>


 

    <div id="tags-container" class="item2">
        @forelse ($course->quizzes as $quizz)
            <div class="tag-container">
                <div class="head_toolbar">

                </div>
                <div class="inputContainer">
                    <span>{{ $quizz->definition }}</span>
                    <span>{{ $quizz->mota }}</span>
                    <label class="album-label" for="imageInput{{ $quizz->quizzes_id }}">
                        @if ($quizz->image)
                            <img class="album-image" src="{{ URL::to('storage/' . $quizz->image) }}">
                        @else
                            No Image
                        @endif


                        <input type="file" name="quizzes[{{ $quizz->quizzes_id }}][imageInput]"
                            id="imageInput{{ $quizz->quizzes_id }}" class="form-control anh" style="display: none;">
                    </label>

                </div>
            </div>
        @empty
            <p>Danh sách quizzes trống.</p>
        @endforelse
    </div>

    <center> <a class="quiz-button" href="{{ route('card.random', ['courseId' => $course->course_id]) }}">Generate
            Random Quiz</a>
        <a class="edit-button" href="{{ route('course.edit', ['course' => $course->course_id]) }}">edit</a>
    </center>
    <!-- Site footer -->
@endsection
