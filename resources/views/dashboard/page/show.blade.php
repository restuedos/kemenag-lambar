@extends('layouts.core')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update File</h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    {{ $page->title }}

                    <p>{{ $page->slug }}</p>
                    <p>{!! $page->body !!}</p>

                </div>
                <!-- /.card-body -->
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
