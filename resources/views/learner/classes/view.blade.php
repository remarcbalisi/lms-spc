@extends('learner.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="">Course Materials</a> |
                        <a href="">Announcements</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

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

                        <form method="post" action="{{route('learner-store-post', ['course_subject_user_id' => $course_subject_user->id])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="body" id="body" rows="3" placeholder="What's on you mind?.."></textarea>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="file">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" name="file[]" multiple aria-describedby="Image">
                                    <label class="custom-file-label" for="file">Choose File</label>
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
            @foreach( $course_subject_user->posts()->orderBy('created_at', 'desc')->get() as $post )
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
                                        <br>
                                        @foreach( $post->multimedias()->get() as $multimedia )
                                            @if( $multimedia->type == 'jpeg' || $multimedia->type == 'jpg' || $multimedia->type == 'png')
                                                <img style="max-width: 50%;" src="{{asset('storage/' . str_replace("public/", "", $multimedia->directory))}}" >
                                                <br>
                                            @else
                                                <a href="{{route('file-download', ['multimedia_id'=>$multimedia->id])}}" >{{$multimedia->directory}}</a>
                                                <p style="font-size: 12px;">Click the file to download</p>
                                                <br>
                                            @endif
                                        @endforeach
                                        <div style="border-bottom: 1px solid; padding-bottom: 13px;" ></div>
                                        Comments
                                        <ul>
                                            @foreach( $post->comments()->get() as $comment)
                                                <li>
                                                    <strong>{{$comment->commentator->fname . ' ' . $comment->commentator->lname}} says..</strong>
                                                    {{$comment->body}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="col-md-12">
                                        <form method="post" action="{{route('lecturer-store-comment', ['post_id'=>$post->id])}}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <input name="body" type="text" class="form-control form-control-sm" placeholder="Comment..">
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
