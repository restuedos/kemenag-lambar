@extends('layouts.core')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <div class="container-fluid">
                    @include('dashboard.category-subcategory.includes.notification')
                    <h4> Manajemen Menu</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    @include('dashboard.category-subcategory.create')
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 dd" id="nestable-wrapper">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Struktur Menu Navigasi</h4>
                                    <ol class="dd-list list-group">
                                        @foreach ($categories as $k => $category)
                                            <li class="dd-item list-group-item" data-id="{{ $category['category_id'] }}">
                                                <div class="dd-handle">{{ $category['name'] }}</div>
                                                <div class="dd-option-handle">
                                                    <a class="btn btn-warning btn-xs"
                                                        href="{{ route('category-subcategory.edit', ['category_id' => $category['category_id']]) }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-xs"
                                                        href="{{ route('category-subcategory.remove', ['category_id' => $category['category_id']]) }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>

                                                {{-- @dd($category->categories); --}}

                                                @if (!empty($category->categories))
                                                    @include(
                                                        'dashboard.category-subcategory.child-includes.child-category-view',
                                                        ['category' => $category]
                                                    )
                                                @endif
                                            </li>
                                        @endforeach
                                    </ol>
                                    <div class="row">
                                        <form action="{{ route('category-subcategory.save-nested-categories') }}"
                                            method="post">
                                            {{ csrf_field() }}
                                            <textarea style="display: none;" name="nested_category_array" id="nestable-output"></textarea>
                                            <button type="submit" class="btn btn-success" style="margin-top: 15px;">Save
                                                Change</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>

            @push('custom-scripts')
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
                </script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
                    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
                    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
                </script>
                <script src="{{ asset('category-subcategory-assets/js/jquery.nestable.js') }}"></script>
                <script src="{{ asset('category-subcategory-assets/js/style.js') }}"></script>
            @endpush
        </div>
    </div>
@endsection
