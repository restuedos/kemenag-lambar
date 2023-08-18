@if (!empty($category->categories))
    <ol class="dd-list list-group">
        @foreach ($category->categories as $kk => $sub_category)
            <li class="dd-item list-group-item" data-id="{{ $sub_category['category_id'] }}">
                <div class="dd-handle">{{ $sub_category['name'] }}</div>
                <div class="dd-option-handle">
                    <a class="btn btn-warning btn-xs"
                        href="{{ route('category-subcategory.edit', ['category_id' => $sub_category['category_id']]) }}">
                        <i class="fas fa-edit "></i>
                    </a>
                    <a class="btn btn-danger btn-xs"
                        href="{{ route('category-subcategory.remove', ['category_id' => $sub_category['category_id']]) }}">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>

                @include('dashboard.category-subcategory.child-includes.child-category-view', [
                    'category' => $sub_category,
                ])
            </li>
        @endforeach
    </ol>
@endif
