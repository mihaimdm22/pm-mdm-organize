<div class="max-w-7xl mx-auto px-4 sm:px-6">
    <nav class="relative flex items-center justify-between sm:h-10 md:justify-center" aria-label="Global">
        <div class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0">
            <div class="flex items-center justify-between w-full md:w-auto">
                <a href="{{ route('home') }}">
                    <span class="sr-only">MDM Organize</span>
                    <img class="h-16 w-auto sm:h-14" src="{{ Storage::url('images/mdm-organizer_logo_full.png')}}"
                        alt="MDM Organize Logo">
                </a>
            </div>
        </div>

        <div class="hidden md:flex md:space-x-10">
            <a href="{{ route('user.tasks.index') }}" class="font-medium text-gray-500 hover:text-gray-900">My Tasks</a>
            @role('admin')
            <a href="{{ route('admin.home') }}" class="font-medium text-gray-500 hover:text-gray-900">Admin</a>
            @endrole
        </div>
        <div class="hidden md:absolute md:flex md:items-center md:justify-end md:inset-y-0 md:right-0">
            <span class="inline-flex rounded-md shadow">
                @guest
                <a href="{{ route('login') }}"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50 mr-4">
                    Log in
                </a>
                <a href="{{ route('register') }}"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-green-600 bg-white hover:bg-gray-50">
                    Register
                </a>
                @else
                <div class="inline-block text-left">
                    @include('includes.profile-tile')
                </div>
                @endguest
            </span>
        </div>
    </nav>
</div>
