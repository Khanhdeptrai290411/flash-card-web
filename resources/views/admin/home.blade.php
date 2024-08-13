@extends('layout.main')
@section('course')
    @if ($courses)
        @foreach($courses as $course)
            <div class="col">
                <a href="{{ route('course.show', ['course' => $course->course_id]) }}">
                    <div class="card h-100">
                        {{-- Sử dụng user_name thay vì name --}}
                        <img class="h-10 w-10 rounded-full object-cover card-img-top" src="{{ URL::to('storage/' . $course->profile_photo_path) }}" alt="" />
                        <div class="card-body">
                            <h5 class="card-title">{{$course->title}}</h5>
                            <p class="card-text">{{$course->description}}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated: {{$course->updated_at}}</small>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    @else
    <p>Danh sách danh mục trống.</p>
    @endif
@endsection
