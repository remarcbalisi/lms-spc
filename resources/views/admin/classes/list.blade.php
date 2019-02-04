@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Class List</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <ul class="list-group">
                            @foreach($classes as $class)
                                <div class="row">
                                    <div class="col-md-8">
                                        <li class="list-group-item">{{$class->getFullName()}}</li>
                                    </div>
                                    <div class="col-md-4">
                                        <a>
                                            <button type="button" class="btn btn-info">View Students</button>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
