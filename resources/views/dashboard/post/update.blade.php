@extends('layouts.core')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Kabar Terkini</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('post.update', $post->slug) }}" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" name="title"
                                    class="form-control @if ($errors->has('title')) is-invalid @endif" id="title"
                                    value="{{ $post->title }}">
                                @if ($errors->has('title'))
                                    <p class="text-danger">{{ $errors->first('title') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-4">
                                <select name="category_id" id="kategori" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->category_id }}" @if ($post->category_id == $category->category_id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_name'))
                                    <p class="text-danger">{{ $errors->first('category_name') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea name="body" class="my-editor form-control @if ($errors->has('body')) is-invalid @endif" id="my-editor"
                                    cols="30" rows="10">{{ $post->body }}</textarea>
                                @if ($errors->has('body'))
                                    <p class="text-danger">{{ $errors->first('body') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleFormControlFile1" class="col-sm-2 col-form-label">Thumbnail</label>
                            <div class="col-sm-10">
                                <input type="file" name="image"
                                    class="form-control-file @if ($errors->has('image')) is-invalid @endif"
                                    id="exampleFormControlFile1" value="{{ $post->image }}">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="" width="200"
                                    class="mt-3">
                                @if ($errors->has('image'))
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio1"
                                        value="1" @if ($post->status == 1) checked @endif>
                                    <label class="form-check-label" for="inlineRadio1">Aktif</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2"
                                        value="0" @if ($post->status == 0) checked @endif>
                                    <label class="form-check-label" for="inlineRadio2">Non Aktif</label>
                                </div>
                                @if ($errors->has('title'))
                                    <p class="text-danger">{{ $errors->first('title') }}</p>
                                @endif
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>

    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('my-editor', options);
    </script>
@endsection
