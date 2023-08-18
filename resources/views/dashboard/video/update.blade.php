@extends('layouts.core')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Video</h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('video.update', $video->title) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @if ($errors->has('title')) is-invalid @endif"
                                    id="title" name="title" value="{{ $video->title }}">
                                @if ($errors->has('title'))
                                    <p class="text-danger">{{ $errors->first('title') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="caption" class="col-sm-2 col-form-label">Caption</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @if ($errors->has('caption')) is-invalid @endif"
                                    id="caption" name="caption" value="{{ $video->caption }}">
                                @if ($errors->has('caption'))
                                    <p class="text-danger">{{ $errors->first('caption') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleFormControlFile1" class="col-sm-2 col-form-label">Upload Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="image"
                                    class="form-control-file @if ($errors->has('image')) is-invalid @endif"
                                    id="exampleFormControlFile1">
                                <img src="{{ asset('storage/' . $video->image) }}" alt="" width="200"
                                    class="mt-3">
                                @if ($errors->has('image'))
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="link" class="col-sm-2 col-form-label">Link</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @if ($errors->has('link')) is-invalid @endif"
                                    id="link" name="link" value="{{ $video->link }}">
                                @if ($errors->has('link'))
                                    <p class="text-danger">{{ $errors->first('link') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
