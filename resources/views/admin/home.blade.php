<h1>Hello Admin!</h1>
<a class="dropdown-item" href="{{ route('logout') }}"
    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>