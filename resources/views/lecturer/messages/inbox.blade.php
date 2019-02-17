@extends('lecturer.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Inbox
                        <a href="{{route('learner-new-message')}}">
                            <button type="button" class="btn btn-success btn-sm">Create New</button>
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @foreach( $message_threads as $message_thread )
                            <div class="card">
                                <div class="card-body">
                                    <a href="">
                                        <strong>
                                            {{$message_thread->messages()->where('sender', '!=', Auth::user()->id)->first()->sender()->first()->fname}} {{$message_thread->messages()->where('sender', '!=', Auth::user()->id)->first()->sender()->first()->lname}}
                                        </strong>
                                        <p style="color: {{$message_thread->messages()->first()->is_read ? 'lightgray' : 'black'}}">
                                            {{$message_thread->messages()->first()->body}}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
