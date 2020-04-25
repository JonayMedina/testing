@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="col mr-1">
                        <h5 class="">Show Comment</h5>
                        @guest
                            
                        @else
                            @if($comm->user->id == \Auth::user()->id || \Auth::user()->role == 'admin')
                                <div class="col text-right">
                                    <a href="{{route('comments.edit',['comment'=>$comm->id])}}" class="m-2 btn btn-xs btn-secondary btn-rounded">
                                        <i class="fa fa-edit"></i>
                                        EDIT
                                    </a>
                                    <a class="m-2 btn btn-xs btn-warning btn-rounded" href="#"
                                       onclick="event.preventDefault();
                                        document.getElementById('delete-form').submit();"><i class="fa fa-trash"></i>
                                        {{ __('delete') }}
                                    </a>

                                    <form id="delete-form" action="{{ route('comments.destroy',['comment' => $comm->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                    </form>
                                </div>
                            @endif
                        @endguest
                    </div>
                    

                </div>
                
                    <div class="card-body">
                        <div class="card-title"><span>creado por </span>{{ $comm->user->name}}</div>
                        <h5 class="m-2">Comments</h5>
                        <textarea class="col-6">{{ $comm->body }}</textarea>

                    </div>
                    <div class="card-body">
                        @php
                           $post = $comm->post;

                        @endphp
                            <h5 class="card-title">{{$post->name}}</h5>
                        
                        <a href="{{route('posts.show',['post'=>$post->id])}}" class="card-link">Ir al post...</a>
                    </div>
                    
            </div>
        </div>
    </div>
</div>
@endsection