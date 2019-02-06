@extends('lecturer.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Class List</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <ul class="list-group">
                            @foreach($classes as $class)
                                <div class="row">
                                    <div class="col-md-8">
                                        <a href="{{route('lecturer-view-classroom', ['course_subject_id'=>$class->course_subject_id])}}">
                                            <li class="list-group-item">{{$class->course_subject->getFullName()}}</li>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('lecturer-class-student-list', ['course_subject_id'=>$class->course_subject_id,'lecturer_id'=>Auth::user()->id])}}">
                                            <button type="button" class="btn btn-info">View Students</button>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
