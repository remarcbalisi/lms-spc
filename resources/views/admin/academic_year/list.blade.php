@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Academic Year</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Start</th>
                                    <th scope="col">End</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($academic_years as $academic_year)
                                    <tr>
                                        <th scope="row">{{$academic_year->id}}</th>
                                        <td>{{$academic_year->start}}</td>
                                        <td>{{$academic_year->end}}</td>
                                        <td>
                                            <a>
                                                <button type="button" class="btn btn-primary">View</button>
                                            </a>
                                            <a href="{{route('admin-academic-year-edit', ['year_id'=>$academic_year->id])}}">
                                                <button type="button" class="btn btn-warning">Edit</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
