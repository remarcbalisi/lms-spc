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

                            @if(session('success_msg'))
                                <div class="alert alert-success" role="alert">
                                    {{session('success_msg')}}
                                </div>
                            @endif


                            <form method="post" action="{{route('admin-academic-year-store')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="start_year">Start Year</label>
                                    <input type="number" class="form-control" name="start_year" id="start_year" placeholder="Start Year">
                                </div>
                                <div class="form-group">
                                    <label for="end_year">End Year</label>
                                    <input type="number" class="form-control" name="end_year" id="end_year" placeholder="End Year">
                                </div>

                                <button type="submit" class="btn btn-success">Create</button>
                            </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
