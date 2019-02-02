@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Classroom</div>

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


                        <form method="post" action="{{route('admin-classroom-store')}}">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="academic_year">Academic Year</label>
                                </div>
                                <select class="custom-select" name="academic_year" id="academic_year">
                                    <option selected>Choose...</option>
                                    @foreach( $academic_years as $academic_year )
                                        <option value="{{$academic_year->id}}">{{$academic_year->start}} - {{$academic_year->end}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="semester">Semester</label>
                                </div>
                                <select class="custom-select" name="semester" id="semester">
                                    <option selected>Choose...</option>
                                    @foreach( $semesters as $semester )
                                        <option value="{{$semester->id}}">{{$semester->term}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="course">Course</label>
                                </div>
                                <select class="custom-select" name="course" id="course">
                                    <option selected>Choose...</option>
                                    @foreach( $courses as $course )
                                        <option value="{{$course->id}}">{{$course->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="section">Section</label>
                                </div>
                                <select class="custom-select" name="section" id="section">
                                    <option selected>Choose...</option>
                                    @foreach( $sections as $section )
                                        <option value="{{$section->id}}">{{$section->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Create</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
