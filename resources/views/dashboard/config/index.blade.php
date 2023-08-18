@extends('layouts.core')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Website</h3>
                        </div>
                        <!-- /.card-header -->
                        @foreach ($configs as $config)
                            <div class="card-body">
                                <form class="form-horizontal" method="POST"
                                    action="{{ route('config.update', $config->id) }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="ministry_name" class="col-sm-2 col-form-label">Nama Instansi</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="ministry_name"
                                                    name="ministry_name" value="{{ $config->ministry_name }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Logo" class="col-sm-2 col-form-label">Logo</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="logo" class="form-control-file"
                                                    id="logo"> <img src="{{ asset('storage/' . $config->logo) }}"
                                                    alt="logo" width="200" value="{{ $config->logo }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone" class="col-sm-2 col-form-label">Telepon</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="phone" name="phone"
                                                    value="{{ $config->phone }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="email" name="email"
                                                    value="{{ $config->email }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="footer_text" class="col-sm-2 col-form-label">Footer Text</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="footer_text"
                                                    name="footer_text" value="{{ $config->footer_text }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="copyright" class="col-sm-2 col-form-label">Copyright Text</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="copyright" name="copyright"
                                                    value="{{ $config->copyright }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Longitude" class="col-sm-2 col-form-label">Longitude</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Longitude" name="long"
                                                    value="{{ $config->long }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Latitude" class="col-sm-2 col-form-label">Latitude</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Latitude" name="lat"
                                                    value="{{ $config->lat }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" rows="3" placeholder="Alamat Kantor ..." name="address">{{ $config->address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-info">Update</button>
                                    </div>
                                </form>
                            </div>
                        @endforeach

                        <!-- /.card-body -->
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
