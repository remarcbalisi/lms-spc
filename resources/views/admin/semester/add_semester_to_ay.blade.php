@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Semester to Academic Year</div>

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


                        <form method="post" action="{{route('admin-semester-to-academic-year')}}">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="semester_id">Semester</label>
                                </div>
                                <select class="custom-select" name="semester_id" id="semester_id">
                                    <option selected>Choose...</option>
                                    @foreach( $semesters as $semester )
                                        <option value="{{$semester->id}}">{{$semester->term}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="academic_year_id">Academic Year</label>
                                </div>
                                <select class="custom-select" name="academic_year_id" id="academic_year_id">
                                    <option selected>Choose...</option>
                                    @foreach( $academic_years as $academic_year )
                                        <option value="{{$academic_year->id}}">{{$academic_year->start}} - {{$academic_year->end}}</option>
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
