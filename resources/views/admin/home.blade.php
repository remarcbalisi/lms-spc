@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @foreach($academic_year_semesters as $academic_year_semester)
                                <div class="card">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title ">AY {{$academic_year_semester->academic_year->start}} - {{$academic_year_semester->academic_year->end}}</h4>
                                        <p class="card-category"> {{$academic_year_semester->semester->term}} Semester Courses</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class=" text-primary">
                                                    <th>
                                                        Title
                                                    </th>
                                                    <th>
                                                        Code
                                                    </th>
                                                    <th>
                                                        Section
                                                    </th>
                                                    <th>
                                                        Description
                                                    </th>
                                                </thead>
                                                <tbody>
                                                    @foreach( $academic_year_semester->course_subjects()->get() as $course_subject )
                                                    <tr>
                                                        <td>
                                                            <a href="#">
                                                                {{$course_subject->course->title}}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            {{$course_subject->course->code}}
                                                        </td>
                                                        <td>
                                                            {{$course_subject->section->name}}
                                                        </td>
                                                        <td>
                                                            {{$course_subject->course->description}}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
