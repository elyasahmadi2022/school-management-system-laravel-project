@if (! Auth::check())
    @php
        return redirect()->route('login');
    @endphp
@endif

@php
    use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
@endphp

<header
    class="sticky w-full top-0 z-50 bg-white dark:bg-gray-800 shadow h-16 flex justify-between items-center px-6"
>
    <!-- Language Selector -->
    <div class="flex items-center">
        <x-dropdown align="left" width="48">
            <x-slot name="trigger">
                <button
                    class="flex items-center text-sm border border-transparent rounded-md font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition duration-150 ease-in-out"
                >
                    <svg
                        class="w-5 h-5 mr-2"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"
                        ></path>
                    </svg>
                    {{ __('language') }}
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link
                    :href="LaravelLocalization::getLocalizedURL('en')"
                    :active="LaravelLocalization::getCurrentLocale() === 'en'"
                >
                    English
                </x-dropdown-link>
                <x-dropdown-link
                    :href="LaravelLocalization::getLocalizedURL('fa')"
                    :active="LaravelLocalization::getCurrentLocale() === 'fa'"
                >
                    فارسی
                </x-dropdown-link>
                <x-dropdown-link
                    :href="LaravelLocalization::getLocalizedURL('ps')"
                    :active="LaravelLocalization::getCurrentLocale() === 'ps'"
                >
                    پښتو
                </x-dropdown-link>
            </x-slot>
        </x-dropdown>
    </div>

    <!-- Profile / Logout -->
    <div class="flex items-center space-x-4">
        <div class="text-gray-800 dark:text-gray-200 font-medium">
            {{ Auth::user()->name }}
        </div>
        <div class="text-gray-500 dark:text-gray-400 text-sm">
            {{ Auth::user()->email }}
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                type="submit"
                class="text-sm text-red-600 dark:text-red-400 hover:underline"
            >
                Log Out
            </button>
        </form>
    </div>
</header>

<!-- Main Wrapper -->
<div
    class="flex h-[calc(100vh-4rem)] bg-gray-100 dark:bg-gray-900 overflow-hidden"
>
    <!-- Sidebar (Left) -->
    <aside
        class="w-72 bg-white/90 dark:bg-gray-800/90 backdrop-blur shadow-md flex-shrink-0 overflow-y-auto border-r border-gray-200 dark:border-gray-700"
        style="height: calc(100vh - 4rem)"
    >
        <nav class="mt-6 px-4 pb-6 flex flex-col space-y-6">
            @php
                // Shared classes for all nav items
                $navBase =
                    'group flex items-center gap-3 px-4 py-3 rounded-xl text-[15px] font-medium ' .
                    'transition-all duration-200 ease-out ' .
                    'hover:bg-gray-100 hover:text-gray-900 hover:shadow-sm hover:ring-1 hover:ring-gray-200 ' .
                    'dark:hover:bg-gray-700/60 dark:hover:text-white dark:hover:ring-gray-600 ' .
                    'focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500';

                // Optional: active styling helper (works even if x-nav-link already applies active styles)
                $navActive = 'bg-indigo-50 text-indigo-700 shadow-sm ring-1 ring-indigo-100 ' . 'dark:bg-gray-700 dark:text-white dark:ring-gray-600';
            @endphp

            <!-- Student & Teacher Management -->
            <div>
                <h5
                    class="text-gray-500 dark:text-gray-400 uppercase text-xs font-semibold px-2 mb-2 tracking-wider"
                >
                    Student & Teacher Management
                </h5>

                <div class="flex flex-col gap-1.5">
                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')"
                        class="{{ $navBase }} {{ request()->routeIs('dashboard') ? $navActive : 'text-gray-700 dark:text-gray-200' }}"
                    >
                        <!-- layout-dashboard -->
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 shrink-0 opacity-80 group-hover:opacity-100"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M4 4h6v8H4z" />
                            <path d="M14 4h6v4h-6z" />
                            <path d="M14 10h6v10h-6z" />
                            <path d="M4 14h6v6H4z" />
                        </svg>
                        <span>{{ __('dashboard') }}</span>
                    </x-nav-link>

                    <x-nav-link
                        :href="route('teachers.index')"
                        :active="request()->routeIs('teachers.*')"
                        class="{{ $navBase }} {{ request()->routeIs('teachers.*') ? $navActive : 'text-gray-700 dark:text-gray-200' }}"
                    >
                        <!-- school -->
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 shrink-0 opacity-80 group-hover:opacity-100"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M22 9L12 3 2 9l10 6z" />
                            <path d="M6 10.5V16c0 2 3 4 6 4s6-2 6-4v-5.5" />
                        </svg>
                        <span>{{ __('teachers') }}</span>
                    </x-nav-link>

                    <x-nav-link
                        :href="route('students.index')"
                        :active="request()->routeIs('students.*')"
                        class="{{ $navBase }} {{ request()->routeIs('students.*') ? $navActive : 'text-gray-700 dark:text-gray-200' }}"
                    >
                        <!-- users -->
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 shrink-0 opacity-80 group-hover:opacity-100"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M9 7a4 4 0 1 0 0 8a4 4 0 0 0 0-8z" />
                            <path d="M17 11a3 3 0 1 0 0 6" />
                            <path d="M3 21a6 6 0 0 1 12 0" />
                            <path d="M16 21a5 5 0 0 1 5 0" />
                        </svg>
                        <span>{{ __('students') }}</span>
                    </x-nav-link>

                    <x-nav-link
                        :href="route('classes.index')"
                        :active="request()->routeIs('classes.*')"
                        class="{{ $navBase }} {{ request()->routeIs('classes.*') ? $navActive : 'text-gray-700 dark:text-gray-200' }}"
                    >
                        <!-- chalkboard -->
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 shrink-0 opacity-80 group-hover:opacity-100"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M4 5h16v11H4z" />
                            <path d="M8 21h8" />
                            <path d="M10 16l-2 5" />
                            <path d="M14 16l2 5" />
                        </svg>
                        <span>{{ __('classes') }}</span>
                    </x-nav-link>

                    <x-nav-link
                        :href="route('subjects.index')"
                        :active="request()->routeIs('subjects.*')"
                        class="{{ $navBase }} {{ request()->routeIs('subjects.*') ? $navActive : 'text-gray-700 dark:text-gray-200' }}"
                    >
                        <!-- book -->
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 shrink-0 opacity-80 group-hover:opacity-100"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path
                                d="M6 4h11a2 2 0 0 1 2 2v14a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2V6a2 2 0 0 1 2-2z"
                            />
                        </svg>
                        <span>{{ __('subjects') }}</span>
                    </x-nav-link>
                </div>
            </div>

            <!-- Employee Management -->
            <div>
                <h3
                    class="text-gray-500 dark:text-gray-400 uppercase text-xs font-semibold px-2 mb-2 tracking-wider"
                >
                    {{ __('employee_management') }}
                </h3>

                <div class="flex flex-col gap-1.5">
                    <x-nav-link
                        :href="route('employees.index')"
                        :active="request()->routeIs('employees.*')"
                        class="{{ $navBase }} {{ request()->routeIs('employees.*') ? $navActive : 'text-gray-700 dark:text-gray-200' }}"
                    >
                        <!-- briefcase -->
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 shrink-0 opacity-80 group-hover:opacity-100"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M8 7V6a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1" />
                            <path
                                d="M3 7h18v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"
                            />
                            <path d="M12 12v0" />
                        </svg>
                        <span>{{ __('employees') }}</span>
                    </x-nav-link>
                </div>
            </div>

            <!-- Financial Management -->
            <div>
                <h3
                    class="text-gray-500 dark:text-gray-400 uppercase text-xs font-semibold px-2 mb-2 tracking-wider"
                >
                    Financial
                </h3>

                <div class="flex flex-col gap-1.5">
                    <x-nav-link
                        :href="route('fees.index')"
                        :active="request()->routeIs('fees.*')"
                        class="{{ $navBase }} {{ request()->routeIs('fees.*') ? $navActive : 'text-gray-700 dark:text-gray-200' }}"
                    >
                        <!-- cash -->
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 shrink-0 opacity-80 group-hover:opacity-100"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path
                                d="M7 9h10a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-6a2 2 0 0 1 2-2z"
                            />
                            <path d="M12 12a2 2 0 1 0 0 4a2 2 0 0 0 0-4z" />
                            <path d="M7 12h0" />
                            <path d="M17 16h0" />
                        </svg>
                        <span>Fees</span>
                    </x-nav-link>

                    <x-nav-link
                        :href="route('salaries.index')"
                        :active="request()->routeIs('salaries.*')"
                        class="{{ $navBase }} {{ request()->routeIs('salaries.*') ? $navActive : 'text-gray-700 dark:text-gray-200' }}"
                    >
                        <!-- coins -->
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 shrink-0 opacity-80 group-hover:opacity-100"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path
                                d="M9 14c0 1.657 2.239 3 5 3s5-1.343 5-3s-2.239-3-5-3s-5 1.343-5 3z"
                            />
                            <path d="M14 17v4" />
                            <path d="M7 10c0 1.657 2.239 3 5 3" />
                            <path d="M12 13V7" />
                            <path
                                d="M7 10V6c0-1.657 2.239-3 5-3s5 1.343 5 3v4"
                            />
                        </svg>
                        <span>{{ __('salaries') }}</span>
                    </x-nav-link>

                    <x-nav-link
                        :href="route('expenditures.index')"
                        :active="request()->routeIs('expenditures.*')"
                        class="{{ $navBase }} {{ request()->routeIs('expenditures.*') ? $navActive : 'text-gray-700 dark:text-gray-200' }}"
                    >
                        <!-- receipt -->
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 shrink-0 opacity-80 group-hover:opacity-100"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path
                                d="M9 4h6a2 2 0 0 1 2 2v16l-2-1l-2 1l-2-1l-2 1l-2-1l-2 1V6a2 2 0 0 1 2-2z"
                            />
                            <path d="M9 8h6" />
                            <path d="M9 12h6" />
                            <path d="M9 16h4" />
                        </svg>
                        <span>{{ __('expenditures') }}</span>
                    </x-nav-link>
                </div>
            </div>

            <!-- Others -->
            <div>
                <h3
                    class="text-gray-500 dark:text-gray-400 uppercase text-xs font-semibold px-2 mb-2 tracking-wider"
                >
                    {{ __('others') }}
                </h3>

                <div class="flex flex-col gap-1.5">
                    <x-nav-link
                        :href="route('attendances.index')"
                        :active="request()->routeIs('attendances.*')"
                        class="{{ $navBase }} {{ request()->routeIs('attendances.*') ? $navActive : 'text-gray-700 dark:text-gray-200' }}"
                    >
                        <!-- clipboard-check -->
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 shrink-0 opacity-80 group-hover:opacity-100"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path
                                d="M9 5h6a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2z"
                            />
                            <path d="M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2" />
                            <path d="M9 14l2 2l4-4" />
                        </svg>
                        <span>{{ __('attendances') }}</span>
                    </x-nav-link>

                    <x-nav-link
                        :href="route('timetables.index')"
                        :active="request()->routeIs('timetables.*')"
                        class="{{ $navBase }} {{ request()->routeIs('timetables.*') ? $navActive : 'text-gray-700 dark:text-gray-200' }}"
                    >
                        <!-- calendar-time -->
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 shrink-0 opacity-80 group-hover:opacity-100"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M8 7V3" />
                            <path d="M16 7V3" />
                            <path d="M4 9h16" />
                            <path
                                d="M5 5h14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2z"
                            />
                            <path d="M15 16h-2v-2" />
                        </svg>
                        <span>Timetables</span>
                    </x-nav-link>

                    <x-nav-link
                        :href="route('vehicles.index')"
                        :active="request()->routeIs('vehicles.*')"
                        class="{{ $navBase }} {{ request()->routeIs('vehicles.*') ? $navActive : 'text-gray-700 dark:text-gray-200' }}"
                    >
                        <!-- bus -->
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 shrink-0 opacity-80 group-hover:opacity-100"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path
                                d="M5 17h14V7a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4z"
                            />
                            <path d="M5 17v2" />
                            <path d="M19 17v2" />
                            <path d="M7 13h10" />
                            <path d="M7 7h10" />
                            <path d="M7 21h10" />
                            <path d="M7 17a2 2 0 1 0 0 4" />
                            <path d="M17 17a2 2 0 1 0 0 4" />
                        </svg>
                        <span>{{ __('vehicles') }}</span>
                    </x-nav-link>

                    <x-nav-link
                        :href="route('transfers.index')"
                        :active="request()->routeIs('transfers.*')"
                        class="{{ $navBase }} {{ request()->routeIs('transfers.*') ? $navActive : 'text-gray-700 dark:text-gray-200' }}"
                    >
                        <!-- transfer -->
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 shrink-0 opacity-80 group-hover:opacity-100"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M20 10h-16l4-4" />
                            <path d="M4 14h16l-4 4" />
                        </svg>
                        <span>{{ __('transfers') }}</span>
                    </x-nav-link>
                </div>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-4 bg-gray-100 dark:bg-gray-900 h-full">
        <div class="w-full h-full overflow-auto">
            @yield('content')
        </div>
    </main>
</div>
