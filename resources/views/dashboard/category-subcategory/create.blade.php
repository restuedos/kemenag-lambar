<div class="container">
    {{-- @include('dashboard.category-subcategory.includes.notification') --}}
    <form action="{{ route('category-subcategory.store') }}" method="post">
        {{ csrf_field() }}
        @if (isset($category['category_id']))
            <input type="hidden" name="category_id" value="{{ $category['category_id'] }}">
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" class="form-control" id="name"
                            value="{{ isset($category['name']) ? $category['name'] : '' }}">
                        @if ($errors->first('name'))
                            <label for="" style="color:red;">{{ $errors->first('name') }}</label>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="parent" class="col-sm-3 col-form-label">Parent</label>
                    <div class="col-sm-9">
                        <select name="parent_id" class="form-control" id="parent">
                            <option value="">Pilih Parent Menu</option>
                            @foreach ($categories as $k => $v)
                                <option value="{{ $v['category_id'] }}"
                                    {{ isset($category['parent_id']) && $category['parent_id'] == $v['category_id'] ? 'selected="selected"' : '' }}>
                                    {{ $v['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="url" class="col-sm-3 col-form-label">Link/url</label>
                    <div class="col-sm-9">
                        <input type="text" name="url" class="form-control" id="url"
                            value="{{ isset($category['url']) ? $category['url'] : '' }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <input type="submit" class="btn btn-success" value="Save Menu">
            </div>
        </div>

    </form>
</div>
