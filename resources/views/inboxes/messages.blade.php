<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @forelse($messages as $message)
                        <div class="grid grid-cols-1 gap-y-4">
                            <div>
                                <p class="mb-1">You received a message from: {{ $message->user->name }}
                                    , {{ \Carbon\Carbon::parse($message->scheduled_at)->diffForHumans() }}</p>
                                <div
                                    class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50"
                                    role="alert">
                                    <span class="font-medium">{{ $message->message }}
                                </div>
                            </div>
                        </div>
                    @empty
                        No one has sent you a message yet
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
