@extends('learner.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
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
                                    <div class="col-md-12">
                                        <a href="{{route('learner-view-classroom', ['course_subject_id'=>$class->course_subject_id])}}">
                                            <li class="list-group-item">{{$class->course_subject->getFullName()}}</li>
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
