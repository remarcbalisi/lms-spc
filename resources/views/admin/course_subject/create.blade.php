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


                        <form method="post" action="{{route('admin-store-subject-to-course')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="academic_year_semester_id">Academic Year</label>
                                </div>
                                <select class="custom-select" name="academic_year_semester_id" id="academic_year_semester_id">
                                    <option selected>Choose...</option>
                                    @foreach( $academic_year_semesters as $academic_year_semester )
                                        <option value="{{$academic_year_semester->id}}">{{$academic_year_semester->getSemesterFullName()}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="course_id">Course</label>
                                </div>
                                <select class="custom-select" name="course_id" id="course_id">
                                    <option selected>Choose...</option>
                                    @foreach( $courses as $course )
                                        <option value="{{$course->id}}">{{$course->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="subject_id">Subject</label>
                                </div>
                                <select class="custom-select" name="subject_id" id="subject_id">
                                    <option selected>Choose...</option>
                                    @foreach( $subjects as $subject )
                                        <option value="{{$subject->id}}">{{$subject->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="section_id">Section</label>
                                </div>
                                <select class="custom-select" name="section_id" id="section_id">
                                    <option selected>Choose...</option>
                                    @foreach( $sections as $section )
                                        <option value="{{$section->id}}">{{$section->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Add</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
