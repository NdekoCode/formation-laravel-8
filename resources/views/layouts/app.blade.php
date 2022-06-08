@include('layouts.partials.header')
<div class="container mx-auto max-w-7xl">
    @if (session('success'))
        <div class="m-1 rounded border border-green-300 bg-green-100 px-2 py-3 text-green-400">{{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-200x-2 m-1 rounded border border-red-500 p-2 py-3 text-red-500">{{ session('error') }}</div>
    @endif
    @yield('content')
</div>
@include('layouts.partials.footer')
