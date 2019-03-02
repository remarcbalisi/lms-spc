@extends('learner.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">New Message</div>

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


                        <form method="post" action="{{route('learner-store-new-message')}}">
                            @csrf
                            <div class="form-group">
                                <label for="receiver">To (email)</label>
                                <input type="email" class="form-control" name="receiver" id="receiver" placeholder="To (email)">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="3" placeholder="Type your message.."></textarea>
                            </div>


                            <button type="submit" class="btn btn-success btn-sm">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
