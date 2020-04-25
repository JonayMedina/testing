@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="col mr-1">
                        <h5 class="">Show Post</h5>
                        @guest
                        @else
                            @if($post->user->id == \Auth::user()->id || \Auth::user()->role == 'admin')
                                <div class="col text-right">
                                    <a href="{{route('posts.edit',['post'=>$post->id])}}" class="m-2 btn btn-xs btn-secondary btn-rounded">
                                        <i class="fa fa-edit"></i>
                                        EDIT
                                    </a>
                                    <a class="m-2 btn btn-xs btn-warning btn-rounded" href="#"
                                       onclick="event.preventDefault();
                                        document.getElementById('delete-form').submit();"><i class="fa fa-trash"></i>
                                        {{ __('delete') }}
                                    </a>

                                    <form id="delete-form" action="{{ route('posts.destroy',['post' => $post->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                    </form>
                                </div>
                            @endif
                        @endguest
                    </div>
                    

                </div>
                
                    <div class="card-body">
                    
                        <h4>{{$post->name}}</h4>

                        <span>{{ $post->description}}</span>
                    
                        <h5 class="m-2">Comments</h5>       
                        @foreach($post->comment as $comment)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{ $comment->body}}</li>
                            </ul>
                        @endforeach
                    
                    </div>
                    <div class="card-footer">
                        @if($errors->any())
                            <h4>{{$errors->first()}}</h4>
                        @endif
                        
                        <h5 class="card-title">Create Comment?</h5>
                        @guest
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login to comment') }}</a>
                        @else
                        <h6 class="card-title">{{ (\Auth::user()->name) }}</h6>

                            <form action="{{ route('comments.store',['comment' => $post->id]) }}" method="POST" >
                            @csrf
                            <div class="form-group">
                                <label for="textbody">Type your comment</label>
                                <textarea class="form-control" id="textbody" name="body" rows="3"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        @endguest
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection