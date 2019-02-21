@extends('lecturer.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Assessment</div>

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

                        <form method="post" action="{{route('lecturer-store-assessment', ['course_subject_user_id'=>$course_subject_user->id])}}">
                            @csrf
                            <div class="form-group">
                                <label for="assessment_type">Assessment Type</label>
                                <select class="form-control" name="assessment_type" id="assessment_type">
                                    @foreach( $assessment_types as $assessment_type )
                                        <option value="{{$assessment_type->id}}">{{$assessment_type->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="score">Score</label>
                                <input type="number" class="form-control" name="score" id="score" aria-describedby="score" placeholder="Enter score">
                            </div>
                            <div class="form-group">
                                <label for="total_items">Total Items</label>
                                <input type="number" class="form-control" name="total_items" id="total_items" aria-describedby="score" placeholder="Total Items">
                            </div>
                            <div class="form-group">
                                <label for="date_taken">Date Taken</label>
                                <input type="date" class="form-control" name="date_taken" id="date_taken" placeholder="Date Taken">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
