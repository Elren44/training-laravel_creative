<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">

        <li class="nav-header">АДМИН ПАНЕЛЬ</li>
        <li class="nav-item">
            <a href="{{route('admin.post.index')}}" class="nav-link">
                <i class="nav-icon far fa-solid fa-list"></i>
                {{--                <i class="fa-solid fa-align-justify"></i>--}}
                {{--                <i class="fa-solid fa-align-justify"></i>--}}
                {{--                <i class="nav-icon far fa-solid fa-list"></i>--}}
                <p>
                    Посты
                    <span class="badge badge-info right">{{$postcount}}</span>
                </p>
            </a>
        </li>
    </ul>
</nav>
