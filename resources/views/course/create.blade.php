@extends('card.create')
@section('course')
    <form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data" id="quizzForm">
        {{ csrf_field() }}
        <div class="form-group item1">

            <input type="text" id="title" name="title" class="form-control " placeholder="Nhập tiêu đề" required  autocomplete="title">
            
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="form-group item3">

            <textarea id="description" name="description" class="form-control" placeholder="Nhập mô tả" required  autocomplete="description"></textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="form-group item4">

            <input type="text" id="nameschool" name="nameschool" class="form-control"
                placeholder="Nhập tên trường"></input>
                @error('nameschool')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>  
        <div class="form-group item5">

            <input type="text" id="namecourse" name="namecourse" class="form-control"
                placeholder="Nhập tên khóa học"></input>
                @error('namecourse')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div id="tags-container" class="item2"></div>
    </form>
@endsection
