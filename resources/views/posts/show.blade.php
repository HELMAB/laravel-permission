@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Show Post</div>

                    <div class="card-body">
                        <h3>{{ $post->title }}</h3>
                        <p class="text-muted">Created at {{ $post->created_at }}</p>
                        <article>{{ $post->body }}</article>
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
