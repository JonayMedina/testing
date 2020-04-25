@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ (__('Edit Comments')) }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('comments.update',['comment' => $comm->id]) }}">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="body" class="col-md-4 col-form-label text-md-right">{{ __('Commentary Body') }}</label>

                            <div class="col-10 offset-2">
                                <textarea id="body"  class="form-control @error('body') is-invalid @enderror" name="body" >{{ $comm->body }}</textarea>

                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit Post') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
