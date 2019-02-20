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
                            @foreach($students as $student)
                                <div class="row">
                                    <div class="col-md-8">
                                        <li class="list-group-item">{{$student->user->fname .' ' . $student->user->lname}}</li>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('lecturer-add-assessment', ['course_subject_user_id'=>$student->id])}}">
                                            <button type="button" class="btn btn-info btn-sm">Add Assessment</button>
                                        </a>
                                        <a href="{{route('lecturer-view-assessment', ['course_subject_user_id'=>$student->id])}}">
                                            <button type="button" class="btn btn-info btn-sm">View Assessment</button>
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
