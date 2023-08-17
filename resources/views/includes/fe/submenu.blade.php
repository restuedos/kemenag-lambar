@if (!empty($category->categories))

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
            aria-expanded="false">{{ $category->name }}</a>
        <ul class="dropdown-menu">
            @foreach ($category->categories as $kk => $sub_category)
                <li><a class="dropdown-item" href="{{ $sub_category['url'] }}">{{ $sub_category['name'] }}</a></li>

                @if (count($sub_category->categories))
                @endif
            @endforeach

        </ul>
    </li>


@endif
