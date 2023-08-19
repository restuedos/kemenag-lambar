@extends('layouts.core')

@section('content')
    <section class="content">
        <div class="row">
            <div class="container-fluid">
                <div class="col-md-8">

                    <div class="card mt-3">
                        <div class="card-header ">
                            <h3 class="card-title">Update Data User</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.update', $user->email) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Nama :</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $user->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-form-label">Email :</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ $user->email }}"required>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-form-label">Password Baru:</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirm-password" class="col-form-label">Konfirmasi Password Baru:</label>
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
        </div>
    </section>
@endsection
