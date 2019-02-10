@extends('lecturer.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

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

                        <form method="post" action="{{route('lecturer-store-post', ['course_subject_user_id' => $course_subject_user->id])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="body" id="body" rows="3" placeholder="What's on you mind?.."></textarea>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="post_type_id" id="post_type_id">
                                    @foreach($post_types as $post_type)
                                        <option value="{{$post_type->id}}">{{$post_type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img" name="img" aria-describedby="Image">
                                    <label class="custom-file-label" for="img">Choose Image</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Post it!</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <br>

        @foreach( $course_subject->course_subject_users()->get() as $course_subject_user )
            @foreach( $course_subject_user->posts()->get() as $post )
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>{{$course_subject_user->user->fname . ' ' . $course_subject_user->user->lname}}</strong>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12" style="margin-bottom: 30px;">
                                        {{$post->body}}
                                        <div style="border-bottom: 1px solid; padding-bottom: 13px;" ></div>
                                        Comments
                                        <ul>
                                            <li>test</li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="col-md-12">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control form-control-sm" placeholder="Comment..">
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="submit" class="btn btn-primary btn-sm mb-2">Comment</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <br>
            @endforeach
        @endforeach

    </div>
@endsection
