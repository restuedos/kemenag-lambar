@extends('layouts.front')

@section('content')
    <section class="detail_post">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <img src="img/project3.jpg" alt="" class="img-fluid">
                    <h3 class="mt-3">{{ $post->title }}</h3>
                    <p class="justify">{{ $post->created_at->format('d M Y') }} | Kategori : {{ !empty($post->category->name) ? $post->category->name : '' }}<span class="text-success">
                        </span> </p>
                    <p>{!! $post->body !!}</p>
                    <p>Created by : {{ $post->user->name }} </p>
                </div>

                <div class="col-md-4">
                    <h3>Publikasi Terbaru</h3>
                    @foreach ($posts as $p)
                        <article class="blog-post mb-5">
                            <img src="{{ asset('storage/' . $p->image) }}" alt="">
                            <div class="content">
                                <small></small>
                                <h3>{{ $p->title }}</h3>
                                <p class="justify">{{ str_limit(strip_tags($p->body), 10) }}</p>
                                <a href="{{ route('post.show', $p->slug) }}" class="ms-auto">Selengkapnya</a>
                            </div>
                        </article>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection
