@extends('layouts.core')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Kategori</h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @if ($errors->has('name')) is-invalid @endif"
                                    id="name" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
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
