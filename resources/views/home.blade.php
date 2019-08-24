@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 margin-bottom">
            @can('write post')
                <a href="{{ route('post.create') }}" class="btn btn-primary btn-xs">New post</a>
            @endcan
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($posts as $post)
                        <div>
                            <h3>
                                <a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
                            </h3>
                            @if(!is_null($post->published_at))
                                <span class="badge badge-success">Published at {{ $post->published_at }}</span>
                            @endif
                            <p class="small">
                                @can('edit post')
                                    <span><a href="{{ route('post.edit', $post->id) }}">Edit</a></span>
                                @endcan
                                @if(is_null($post->published_at))
                                    @can('publish post')
                                        | <span><a href="{{ route('post.publish', $post->id) }}">Publish</a></span>
                                    @endcan
                                @endif
                                @can('delete post')
                                    | <span><a href="{{ route('post.delete', $post->id) }}">Delete</a></span>
                                @endcan
                                {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                            </p>
                            <article>{{ str_limit($post->body) }}</article>
                            <hr/>
                        </div>
                    @endforeach
                    <br/>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
