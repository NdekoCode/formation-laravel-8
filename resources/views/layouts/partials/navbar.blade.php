<nav class="border-b border-gray-100 py-3">
    <div class="container mx-auto flex max-w-7xl items-center justify-between">
        <a href="" class="font-bold">Laravel-formation</a>
        <ul class="flex items-center">
            <li class="mx-3"><a
                    class="text-md {{ addClassOnCurrentLink('app_home') }} font-normal text-blue-500"
                    href="{{ route('app_home') }}">Acceuil</a>
            </li>
            <li class="mx-3"><a
                    class="text-md {{ addClassOnCurrentLink('app_contact') }} font-normal text-blue-500"
                    href="{{ route('app_contact') }}">Nous
                    contacter </a></li>

            <li class="mx-3"><a
                    class="text-md {{ addClassOnCurrentLink('app_posts') }} font-normal text-blue-500"
                    href="{{ route('app_posts') }}">Posts</a></li>
            <li class="mx-3"><a
                    class="text-md {{ addClassOnCurrentLink('app_projects') }} font-normal text-blue-500"
                    href="{{ route('app_projects') }}">Nos
                    projects</a></li>
        </ul>
    </div>

</nav>
