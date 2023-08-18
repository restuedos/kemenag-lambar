@extends('layouts.front')
@section('content')
    <section class="detail_post">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-md-3 mb-5">
                                <article class="blog-post">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="">
                                    <div class="content">
                                        <small>{{ $post->created_at->format('d M Y') }}</small>
                                        <h5>{{ $post->title }}</h5>
                                        <p>{{ str_limit(strip_tags($post->body), 10) }}</p>
                                        <a href="{{ route('post.show', $post->slug) }}" class="ms-auto">Selengkapnya</a>
                                    </div>
                                </article>
                            </div>
                        @endforeach

                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        {!! $posts->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
