@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="post" class="form mb-4">
                        @csrf
                        <div class="form-group">
                            <textarea name="body" id="body" cols="70" rows="5" class="forn-control @error('body') is-invalid @enderror">{{ old('body') }}</textarea>

                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>

                    @if($posts->count())
                        @foreach ($posts as $post)
                            <div class="media mb-2">
                                <div class="media-body">
                                    <h6>{{ $post->user->name }} ({{ $post->created_at->diffForHumans() }})</h6>

                                    <p class="mt-2">{{ $post->body }}</p>
                                </div>
                            </div>
                        @endforeach

                        {{ $posts->links('pagination::bootstrap-4') }}
                    @else
                        <p class="mb-0">There are no posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
