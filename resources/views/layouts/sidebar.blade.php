<div class="sidebar" data-color="purple" data-image="">
    {{-- {{ asset('admin_css/assets/img/sidebar-1.jpg') }} --}}
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text">
            Creative Tim
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="admin">
                <a href="{{ route('admin.index') }}">
                    <p>Admin</p>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.author.index') }}">
                    <p>Authors</p>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.publishing.index') }}">
                    <p>Publishing Homes</p>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.category.index') }}">
                    <p>Categories</p>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.book.index') }}">
                    <p>Books</p>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.slider.index') }}">
                    <p>Sliders</p>
                </a>
            </li>
            <li>
                <a href="./notifications.html">
                    <p>Notifications</p>
                </a>
            </li>
        </ul>
    </div>
</div>
