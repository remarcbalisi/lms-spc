@extends('lecturer.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Assessment</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Date Taken</th>
                                @foreach( $assessment_types as $assessment_type)
                                <th scope="col">{{$assessment_type->type}}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $assessments as $assessment)
                            <tr>
                                <td>{{$assessment->date_taken}}</td>
                                @foreach( $assessment_types as $assessment_type)

                                        @if( $assessment->assessment_type_id == $assessment_type->id )
                                            <td>{{$assessment->score}} / {{$assessment->total_items}}</td>
                                        @else
                                            <td>X</td>
                                        @endif

                                @endforeach
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
