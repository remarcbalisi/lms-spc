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

                        <p><strong>Start: {{$academic_year->start}}</strong></p>
                        <p><strong>End: {{$academic_year->end}}</strong></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
