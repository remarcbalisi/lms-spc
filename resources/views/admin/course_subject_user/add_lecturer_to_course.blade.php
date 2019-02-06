@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Subject to a Course</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session('success_msg'))
                            <div class="alert alert-success" role="alert">
                                {{session('success_msg')}}
                            </div>
                        @endif


                        <form method="post" action="{{route('admin-store-add-lecturer-to-course')}}">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="user_id">Student</label>
                                </div>
                                <select class="custom-select" name="user_id" id="user_id">
                                    <option selected>Choose...</option>
                                    @foreach( $lecturers as $lecturer )
                                        <option value="{{$lecturer->id}}">{{$lecturer->user->fname . ' ' . $lecturer->user->lname}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="course_subject_id">Subject</label>
                                </div>
                                <select class="custom-select" name="course_subject_id" id="course_subject_id">
                                    <option selected>Choose...</option>
                                    @foreach( $course_subjects as $course_subject )
                                        <option value="{{$course_subject->id}}">{{$course_subject->getFullName()}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Add Now!</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
