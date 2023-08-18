@extends('layouts.core')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Infografis</h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('infographic.update', $infographic->title) }}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="title" class="col-form-label">Judul :</label>
                            <input type="text" class="form-control @if ($errors->has('title')) is-invalid @endif"
                                id="title" name="title" value="{{ $infographic->title }}">
                            @if ($errors->has('title'))
                                <p class="text-danger">{{ $errors->first('title') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Image</label>
                            <input type="file" name="image"
                                class="form-control-file @if ($errors->has('image')) is-invalid @endif"
                                id="exampleFormControlFile1">
                            <img src="{{ asset('storage/' . $infographic->image) }}" alt="" width="200"
                                class="mt-3">
                            @if ($errors->has('image'))
                                <p class="text-danger">{{ $errors->first('image') }}</p>
                            @endif
                        </div>
                        <div class="footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
