<form method="POST" action="{{route('logout')}}">
    @csrf
    <button type="submit" class="text-white ml-4 md:ml-0 cursor-pointer">
        <i class="fa fa-sign-out"></i> Logout
    </button>
</form>