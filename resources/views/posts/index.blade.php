@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Post</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
            </div>
            <div class="container-fluid">
                @if($posts->count() == 0)
                    <div class="pgn push-on-sidebar-open pgn-bar">
                        <div class="alert alert-info text-center" style="">
                            Not Post Here
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="clearfix"></div>
                        <div class="table-responsive">
                            <div id="condensedTable_wrapper" class="dataTables_wrapper no-footer">
                                <table class="table table-condensed table-hover no-footer" id="condensedTable" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Created</th>
                                            <th>Made By</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($posts as $post)
                                            <tr class="faq-row faq-site-{{$post->user_id}} faq-site-category-{{$post->id}}">
                                                <td>{{$post->id}}</td>
                                                <td>{{$post->name}}</td>
                                                <td>{{$post->created_at}}</td>
                                                <td>{{ $post->user->name}}</td>
                                                <td><a href="{{route('posts.show',['post'=>$post->id])}}" class="btn btn-xs btn-info btn-rounded">
                                                        <i class="fa fa-eye"></i>
                                                        Post Details
                                                    </a>
                                                </td>
                                                
                                                @if($post->user->id == \Auth::user()->id || \Auth::user()->role == 'admin')
                                                    
                                                
                                                <td>
                                                    <a href="{{route('posts.show',['post'=>$post->id])}}" class="m-2 btn btn-xs btn-secondary btn-rounded">
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
                                                    
                                                </td>
                                                @endif
                                            </tr>   
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $posts->links()}}
                            </div>

                        </div> 
                    </div>

                @endif
            </div>
        </div>
    </div>
</div>
@endsection