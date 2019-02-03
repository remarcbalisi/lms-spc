@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Course</div>

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


                        <form method="post" action="{{route('admin-course-store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="academic_year_semester_id">Course</label>
                                </div>
                                <select class="custom-select" name="academic_year_semester_id" id="academic_year_semester_id">
                                    <option selected>Choose...</option>
                                    @foreach( $academic_year_semesters as $academic_year_semester )
                                        <option value="{{$academic_year_semester->id}}">{{$academic_year_semester->getSemesterFullName()}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="code">Course Code</label>
                                <input type="text" class="form-control" name="code" id="code" placeholder="Course Code">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Description"></textarea>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img" name="img" aria-describedby="Image">
                                    <label class="custom-file-label" for="img">Choose Image</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Create</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
