@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Post</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('post.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Body</label>
                                <textarea name="body" class="form-control" rows="8"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Create</button>
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
