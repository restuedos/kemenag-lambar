@extends('layouts.core')

@section('content')
    <div class="content">
        <div class="container-fluid">
            @if (Session::has('message'))
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><i class="icon fas fa-check"></i>{{ Session::get('message') }}</p>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Pengumuman</h3>
                    <a href="{{ route('info.create') }}">
                        <button type="button" class="btn btn-primary float-sm-right">Tambah Info</button>
                    </a>
                </div>


                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5px">No</th>
                                <th>Judul</th>
                                {{-- <th>Path</th> --}}
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($infos as $info)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $info->title }}</td>
                                    {{-- <td>{{ $info->file_name }}</td> --}}
                                    <td>{{ $info->link }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-warning">Action</button>
                                            <button type="button"
                                                class="btn btn-sm btn-warning dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('info.edit', $info->title) }}">Edit</a>

                                                <form action="{{ route('info.destroy', $info->title) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-sm dropdown-item">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        </tfoot>
                    </table>
                </div>


                <!-- /.card-body -->
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
