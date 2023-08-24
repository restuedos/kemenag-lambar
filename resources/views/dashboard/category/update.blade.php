@extends('layouts.core')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Kategori</h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('category.update', $category->name) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @if ($errors->has('name')) is-invalid @endif"
                                    id="name" name="name" value="{{ $category->name }}">
                                @if ($errors->has('name'))
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
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
