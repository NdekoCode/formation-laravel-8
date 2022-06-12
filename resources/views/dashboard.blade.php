<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="mb-3 border-b border-gray-200 bg-white p-6">
                    You're logged in!
                </div>
                <div class="border-b border-gray-200 p-6">
                    <h2 class="mb-3 text-2xl font-bold">Notifications</h2>
                    <ul class="bg-white">
                        {{-- On recupere les notifications de l'utilisateur connecter --}}
                        {{ auth()->user()->unreadNotifications->count() }}
                        @forelse (auth()->user()->notifications as $notif)
                            <li class="font-bold">{{ $notif->data['name'] }}</li>
                            <li class="font-bold">{{ $notif->data['email'] }}</li>
                            {{ $notif->markAsRead() }}

                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
