<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>{{ app_title($title ?? null) }}</title>
</head>

<body>
    <main class="flex h-full w-full rounded-3xl shadow-lg">
        <section class="flex w-2/12 flex-col rounded-l-3xl bg-white">
            <div class="mx-auto mt-12 mb-20 w-16 rounded-2xl bg-indigo-600 p-4 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76" />
                </svg>
            </div>
        </section>
        <section class="flex w-6/12 flex-col rounded-r-3xl bg-white px-4">
            <div class="mb-8 flex h-48 items-center justify-between border-b-2">
                <div class="flex items-center space-x-4">
                    <div class="h-12 w-12 overflow-hidden rounded-full">
                        <img src="https://bit.ly/2KfKgdy" loading="lazy" class="h-full w-full object-cover" />
                    </div>
                    <div class="flex flex-col">
                        <h3 class="text-lg font-semibold">{{ $user['name'] }}</h3>
                        <p class="text-light text-gray-400">{{ $user['email'] }}</p>
                    </div>
                </div>
            </div>
            <section>
                <h1 class="text-2xl font-bold">We need UI/UX designer</h1>
                <article class="mt-8 leading-7 tracking-wider text-gray-500">
                    <p>Hi {{ $user['name'] }}</p>
                    <p>The report of {{ $user['date'] }}
                        backends.Work with
                        Product Managers and User Experience designers to create an appealing user experience for
                        desktop
                        web and
                        mobile web.</p>
                    <footer class="mt-12">
                        <p>Thanks & Regards,</p>
                        <p>Alexandar</p>
                    </footer>
                </article>
            </section>
        </section>
    </main>


</body>

</html>
