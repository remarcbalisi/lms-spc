@extends('learner.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Messages</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div style="max-height: 200px; background-color: lightgray; height: 200px; overflow-y: scroll; padding: 10px;">
                                    @foreach( $message_thread->messages()->get() as $message )
                                        <p><strong>{{ $message->sender()->first()->id != Auth::user()->id ?  $message->sender()->first()->fname : 'You'}}:</strong> {{$message->body}}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{route('learner-reply-message', ['message_thread_id'=>$message_thread->id])}}" method="post" class="form-inline">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="message" id="message" placeholder="Type your message">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
