@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Classrooms</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @foreach($classrooms as $classroom)
                            <div class="card">
                                <div class="card-body">
                                    <a href="#"><h4>{{$classroom->course->title}} - {{$classroom->section->name}}</h4></a>
                                    <h5>{{$classroom->semester->term}} Semester</h5>
                                    <h6>{{$classroom->academic_year->start}} - {{$classroom->academic_year->end}}</h6>
                                </div>
                            </div>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
