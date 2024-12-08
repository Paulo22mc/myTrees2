<header class="navbar">
    <h1 class="navbar__brand">
        <a href="{{ route('admin.dashboard') }}" class="navbar__link">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="navbar__icon bi bi-house-fill" viewBox="0 0 16 16">
                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
            </svg> My Trees
        </a>
    </h1>

    <ul class="navbar__menu">
        <li><a href="{{route('friends.app')}}" class="navbar__link">Friends</a></li>
        <li><a href="{{route('AddUsers.main')}}" class="navbar__link">Add Users</a></li>
        <li><a href="{{route('treeSpecie.create')}}" class="navbar__link">Trees species</a></li>
        <li><a href="{{route('treeForSale.create')}}" class="navbar__link">Trees for sale</a></li>
        <li>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="navbar__button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="navbar__icon bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                    </svg>
                </button>
            </form>
        </li>
    </ul>
</header>
