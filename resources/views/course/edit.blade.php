@extends('card.editcard')
@section('course')
    <form action="{{ route('course.update', ['course' => $course->course_id,$quizzes->quizzes_id]) }}" method="post" enctype="multipart/form-data" id="quizzForm">
        {{ csrf_field() }}
        @method('PUT')
        @if ($course)
            <div class="form-group item1">
                <input type="text" id="title" name="title" class="form-control" placeholder="Nhập tiêu đề"
                    value="{{ $course->title }}">
            </div>
            <div class="form-group item3">
                <textarea id="description" name="description" class="form-control"
                    placeholder="Nhập mô tả">{{ $course->description }}</textarea>
            </div>
            <div class="form-group item4">
                <input type="text" id="nameschool" name="nameschool" class="form-control"
                    placeholder="Nhập tên trường" value="{{ $course->nameschool }}">
            </div>
            <div class="form-group item5">
                <input type="text" id="namecourse" name="namecourse" class="form-control"
                    placeholder="Nhập tên khóa học" value="{{ $course->namecourse }}">
            </div>
        @else
            <p>Danh sách danh mục trống.</p>
        @endif

        <div id="tags-container" class="item2">
            @forelse ($course->quizzes as $quizz)
            
                <div class="tag-container">
                    <div class="head_toolbar">
                        <span>{{ $quizz->quizzes_id }}</span>
                        <a href="{{ route('quizz.delete', $quizz->quizzes_id) }}">
                            <i class="fas fa-trash-alt" style="font-size:medium;"></i>
                 
                        </a>
                    </div>
                    <div class="inputContainer">
                        <input type="text" placeholder="Nhập định nghĩa" name="quizzes[{{ $quizz->quizzes_id }}][definition]" class="form-control question no-box-shadow" value="{{ $quizz->definition }}">
                        <textarea placeholder="Nhập mô tả" name="quizzes[{{ $quizz->quizzes_id }}][mota]" class="form-control thongtin no-box-shadow">{{ $quizz->mota }}</textarea>
                        <label class="album-label" for="imageInput{{ $quizz->quizzes_id }}">
                              @if ($quizz->image)
                              <img class="album-image" src="{{URL::to('storage/'.$quizz->image)}}">
                        @else
                            No Image
                        @endif
   
                 
                            <input type="file" name="quizzes[{{ $quizz->quizzes_id }}][imageInput]" id="imageInput{{ $quizz->quizzes_id }}" class="form-control anh" style="display: none;" >
                        </label>
                        
                    </div>
                </div>
            @empty
                <p>Danh sách quizzes trống.</p>
            @endforelse
        </div>             
        
    </form>
@endsection
