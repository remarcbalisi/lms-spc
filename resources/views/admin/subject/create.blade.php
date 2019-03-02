@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Subject</div>

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


                        <form method="post" action="{{route('admin-subject-store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="code">Subject Code</label>
                                <input type="text" class="form-control" name="code" id="code" placeholder="Subject Code">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="max_student">Max Student</label>
                                <input type="number" class="form-control" name="max_student" id="max_student" placeholder="Max Student">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="img">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img" name="img" aria-describedby="Image">
                                    <label class="custom-file-label" for="img">Choose Image</label>
                                </div>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="is_lab" class="custom-control-input" id="is_lab">
                                <label class="custom-control-label" for="is_lab">Is Laboratory?</label>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success">Create</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
