@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Post</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('post.store') }}">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $post->id }}" name="id"/>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" value="{{ $post->title }}" name="title" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Body</label>
                                <textarea name="body" class="form-control" rows="8">{{ $post->body }}</textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('home') }}">
                            <button class="btn btn-secondary">Back to dashboard</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
