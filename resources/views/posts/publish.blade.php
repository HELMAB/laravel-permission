@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Publish post</div>

                    <div class="card-body">
                        <h1>Publish post</h1>
                        <a href="{{ route('home') }}">
                            <button class="btn btn-success">Back to dashboard</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
