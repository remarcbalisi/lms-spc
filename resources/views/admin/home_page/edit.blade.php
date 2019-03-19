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

                        @if(session('success_msg'))
                            <div class="alert alert-success" role="alert">
                                {{session('success_msg')}}
                            </div>
                        @endif


                        <form method="post" action="{{route('admin-update-home-page', ['homepage_id'=>$landing_page->id])}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <img style="max-width: 60%;" src="{{asset('storage/' . $landing_page->banner_image)}}">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="banner_image">Banner Image</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="banner_image" name="banner_image" aria-describedby="Image">
                                    <label class="custom-file-label" for="banner_image">Banner Image</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="head_line" name="head_line" value="{{$landing_page->head_line}}" placeholder="Head Tag Line">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
