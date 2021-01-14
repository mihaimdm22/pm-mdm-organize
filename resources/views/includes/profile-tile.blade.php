<div x-data="{ openUserDropdown: false }">
    <div>
        <button type="button"
            class="group w-full bg-gray-100 rounded-md px-3.5 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-purple-500"
            id="options-menu" aria-haspopup="true" aria-expanded="true" @click="openUserDropdown = true">
            <span class="flex w-full justify-between items-center">
                <span class="flex min-w-0 items-center justify-between space-x-3">
                    <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0"
                        src="{{ Storage::url(auth()->user()->avatar)}}" alt="avatar">
                    <span class="flex-1 min-w-0">
                        <span class="text-gray-900 text-sm font-medium truncate">{{ Auth::user()->first_name }}
                            {{ auth()->user()->last_name }}</span>
                        <span class="text-gray-500 text-sm truncate">{{ '@' . Auth::user()->username }}</span>
                    </span>
                </span>
                <!-- Heroicon name: selector -->
                <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </button>
    </div>

    <div class="z-10 mx-3 origin-top absolute right-0 left-0 mt-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200"
        role="menu" aria-orientation="vertical" aria-labelledby="options-menu" x-show="openUserDropdown"
        @click.away="openUserDropdown = false" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95">
        <div class="py-1">
            <a href="{{ route('user.profile') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">View
                profile</a>
        </div>
        <div class="py-1">
            <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem"
                href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>
