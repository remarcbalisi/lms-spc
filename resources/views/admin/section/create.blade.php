@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Section</div>

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


                        <form method="post" action="{{route('admin-section-store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Section Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Section Name">
                            </div>
                            <button type="submit" class="btn btn-success">Create</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
