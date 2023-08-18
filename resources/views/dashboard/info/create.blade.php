@extends('layouts.core')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Pengumuman</h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('info.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="form-control @if ($errors->has('title')) is-invalid @endif" id="title"
                                    name="title" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <p class="text-danger">{{ $errors->first('title') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="link" class="col-sm-2 col-form-label">Link</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="form-control @if ($errors->has('link')) is-invalid @endif" id="link"
                                    name="link" value="{{ old('link') }}">
                                @if ($errors->has('link'))
                                    <p class="text-danger">{{ $errors->first('link') }}</p>
                                @endif
                            </div>
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
