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
                    <h3 class="card-title">Manajemen Users</h3>
                    <button type="button" class="btn btn-primary float-sm-right" data-toggle="modal"
                        data-target="#exampleModal" data-whatever="@mdo">Tambah User</button>
                </div>


                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5px">No</th>
                                <th>Nama</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->level }}</td>
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
                                                    href="{{ route('user.edit', $user->email) }}">Edit</a>

                                                @if ($user->id == Auth::user()->id)
                                                    <button type="submit"
                                                        class="btn btn-sm dropdown-item disabled">Delete</button>
                                                @else
                                                    <form action="{{ route('user.destroy', $user->email) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit"
                                                            class="btn btn-sm dropdown-item">Delete</button>
                                                        {{-- <a class="dropdown-item" href="#">Delete</a> --}}
                                                @endif
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

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('user.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">Nama :</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-form-label">Email :</label>
                                        <input type="text" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-form-label">Password :</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm-password" class="col-form-label">Konfirmasi Password :</label>
                                        <input type="password" class="form-control" id="confirm-password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Pilih Level</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="level">
                                            <option value="admin">Admin</option>
                                            <option value="kua">KUA</option>
                                            <option value="madrasah">Madrasah</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <!-- /.card -->




            </div>
        </div>
    </div>
@endsection
