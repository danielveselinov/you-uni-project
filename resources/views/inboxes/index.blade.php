<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-8 text-2xl text-center text-red-500 font-bold uppercase">Book your message and be
                        YOU</p>
                    <form action="{{ route('inboxes.store') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="user"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lucky
                                one</label>
                            <select id="user" name="user"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled selected>Choose a user</option>
                                @foreach($users as $user)
                                    <option
                                        @selected(old('user', request()->user) == $user->id) value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="scheduled_at"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Save the
                                date</label>
                            <input type="datetime-local" id="scheduled_at" name="scheduled_at"
                                   value="{{ old('scheduled_at') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('scheduled_at')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <label for="message" class="block mb-6 text-sm font-medium text-gray-900 dark:text-white">Your
                            message</label>
                        <textarea id="message" name="message" rows="4"
                                  class="resize-none block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                  placeholder="Write your thoughts here...">{{ old('message') }}</textarea>
                        @error('message')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror

                        <button type="submit"
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 my-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 float-end">
                            Send
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
