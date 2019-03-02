@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Academic Year</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p><strong>AY {{$academic_year->start}} - {{$academic_year->end}}</strong></p>
                        <ul class="list-group">
                            @foreach($academic_year->academic_year_semesters()->get() as $academic_year_semester)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-8">{{$academic_year_semester->semester->term}} Semester</div>
                                        <div class="col-md-4">
                                            <a href="{{route('admin-course-by-ay-semester', ['academic_year_semester_id'=>$academic_year_semester->id])}}">
                                                <button type="button" class="btn btn-info btn-sm">View Courses</button>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
