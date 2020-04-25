@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card w-100">
                <div class="card-header">Recent Posts</div>
                @foreach($posts as $post)
                    <div class="card-body">
                    
                    <h4>{{$post->name}}</h4>

                    <span>{{ $post->description}}</span>
                    
                        <h5 class="m-2">Comments</h5>       
                        @foreach($post->comment as $comment)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Made by: {{ $comment->user->name}}</li>

                                <li class="list-group-item">{{ $comment->body}}</li>
                            </ul>

                        @endforeach
                    
                    </div>
                    <div class="card-footer">
                        <a href="{{route('posts.show',['post'=>$post->id])}}" class="btn btn-xs btn-info btn-rounded">
                            <i class="fa fa-eye"></i>
                            Post Details
                        </a>
                    </div>

                @endforeach

                    {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
