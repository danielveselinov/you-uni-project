<x-public-layout>
    <div class="bg-center bg-cover min-h-screen relative"
         style="background-image: url({{ asset('assets/background.png') }});">
        <nav>
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
                <a href="{{ route('welcome') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('assets/logo.png') }}" class="h-8" alt="">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">YOU</span>
                </a>
                <div class="flex items-center space-x-6 rtl:space-x-reverse">
                    @auth
                        <a href="{{ route('dashboard') }}"
                           class="text-white dark:text-red-500 hover:underline">Dashboard</a>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}"
                           class="text-white dark:text-red-500 hover:underline">Login</a>
                        <a href="{{ route('register') }}"
                           class="text-white dark:text-red-500 hover:underline">Register</a>
                    @endguest
                </div>
            </div>
        </nav>

        <div class="max-w-6xl text-center mx-auto absolute left-1/2 top-1/3 -translate-x-1/2">
            <h1 class="text-6xl text-white font-bold uppercase">Design your Feature</h1>
            <p class="text-white text-lg font-semibold leading-6 mt-12">The concept of time capsule messages serves as
                evidence of humanity's desire to transcend temporal limitations and leave a lasting impact on the
                future, press the button for updates.</p>

            <a href="#reviews"
               class="focus:outline-none text-lg font-bold text-white uppercase bg-red-600 hover:bg-red-700 rounded-lg px-5 py-2.5 my-6 inline-block">
                Click to read more
            </a>
        </div>
    </div>

    <div class="max-w-6xl mx-auto py-12" id="reviews">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($reviews as $review)
                <div
                    class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col items-center py-10">
                        <img class="w-24 h-24 mb-4 rounded-full shadow-lg"
                             src="https://ui-avatars.com/api/?name={{ $review->user->name }}&color=7F9CF5&background=EBF4FF"
                             alt=""/>
                        <h5 class="text-xl font-medium text-gray-900 dark:text-white">{{ $review->user->name }}</h5>
                        <div class="text-center px-4 mt-4 text-gray-600">
                            {{ $review->message }}
                        </div>
                    </div>
                </div>
            @empty
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50"
                     role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Woops!</span> No reviews found yet!
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <footer class="bg-white p-4">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="{{ route('welcome') }}" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('assets/logo.png') }}" class="h-8" alt=""/>
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-gray-900">YOU</span>
                </a>
                <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="{{ route('privacy-policy') }}" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8"/>
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© {{ date('Y') }} <a
                    href="{{ route('welcome') }}" class="hover:underline">YOU™</a>. All Rights Reserved.</span>
        </div>
    </footer>
</x-public-layout>
