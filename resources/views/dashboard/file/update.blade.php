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
                    <form action="{{ route('file.update', $file->title) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="title" class="col-form-label">Judul :</label>
                            <input type="text" class="form-control @if ($errors->has('title')) is-invalid @endif"
                                id="title" name="title" value="{{ $file->title }}">
                            @if ($errors->has('title'))
                                <p class="text-danger">{{ $errors->first('title') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload File</label>
                            <input type="file" name="file_name"
                                class="form-control-file @if ($errors->has('file_name')) is-invalid @endif"
                                id="exampleFormControlFile1">
                            @if ($errors->has('file_name'))
                                <p class="text-danger">{{ $errors->first('file_name') }}</p>
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
