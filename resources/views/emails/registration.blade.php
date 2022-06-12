<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/css/app.css') }}">

    <title>{{ app_title($title ?? null) }}</title>
    <style>
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        li {
            list-style: none;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .main,
        .mail__header,
        .main-section,
        .mail__user,
        .user__detail,
        .mail__header {

            display: flex;
        }

        .mail-section,
        .user__detail,
        .main-section {
            flex-direction: column;

        }

        .main {
            height: 100%;
            width: 100%;
            border-radius: 1.5rem;
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            padding: 1rem;
        }

        .main-section {
            border-top-left-radius: 1.5rem
                /* 24px */
            ;
            border-bottom-left-radius: 1.5rem
                /* 24px */
            ;
            background-color: #fff;
        }

        .main__icon {
            margin-left: auto;
            margin-right: auto;
            margin-top: 3rem
                /* 48px */
            ;
            margin-bottom: 5rem
                /* 80px */
            ;
            width: 4rem
                /* 64px */
            ;
            border-radius: 1rem;
            background-color: rgb(79 70 229);
            padding: 1rem
                /* 16px */
            ;
            color: #fff;
        }

        .mail-section {
            border-top-right-radius: 1.5rem;
            /* 24px */
            border-bottom-right-radius: 1.5rem;
            background-color: #fff;
            ;
        }

        .mail__header {
            margin-bottom: 2rem
                /* 32px */
            ;
            height: 10rem
                /* 192px */
            ;
            align-items: center;
            border-bottom-width: 2px;
            justify-content: space-between;
        }

        .mail__user {
            align-items: center;
            margin-right: calc(1rem);
            margin-left: calc(1rem);
        }

        .user__img {
            height: 3rem
                /* 48px */
            ;
            width: 3rem
                /* 48px */
            ;
            overflow: hidden;
            border-radius: 9999px;
            margin-right: 0.5rem;
        }

        .user__img img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .user__detail p {
            color: rgb(156 163 175);
            font-weight: 300;
        }

        .title-3 {
            font-size: 1.125rem
                /* 18px */
            ;
            line-height: 1.75rem
                /* 28px */
            ;
            font-weight: 600;
        }

        .title-1 {
            font-size: 1.5rem
                /* 24px */
            ;
            line-height: 2rem
                /* 32px */
            ;
            font-weight: 700;
        }

        .article {
            margin-top: 2rem
                /* 32px */
            ;
            line-height: 1.75rem
                /* 28px */
            ;
            letter-spacing: 0.05em;
            color: rgb(107 114 128);
        }

        .mail__footer {
            margin-top: 3rem
                /* 48px */
            ;
        }
    </style>
</head>

<body>
    <main class="main">
        <section class="main-section">
            <div class="main__icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76" />
                </svg>
            </div>
        </section>
        <section class="mail-section">
            <div class="mail__header">
                <div class="mail__user">
                    <div class="user__img">
                        <img src="https://bit.ly/2KfKgdy" loading="lazy" />
                    </div>
                    <div class="user__detail">
                        <h3 class="title-3">{{ $user->name }}</h3>
                        <p>{{ $user->email }}</p>
                    </div>
                </div>
            </div>
            <section class="mail__body">
                <h1 class="title-1">Confirmation de la création de compte</h1>
                <article class="article">
                    <p>{{ intval(date('H')) > 12 ? 'Bonsoir' : 'Bonjour' }} <strong>{{ $user->name }}</strong></p>
                    <p>La création de votre compte a été effectué avec succés, nous vous souhaitons le bienvenus dans
                        l'equipe de bongobtrust, pour plus d'information veuillez contactez l'assistant technique ainsi
                        le bureau administratif.</p>
                    <footer class="mail__footer">
                        <p>Merci & Cordialement,</p>
                        <p>Arick Bulakali</p>
                    </footer>
                </article>
            </section>
        </section>
    </main>


</body>

</html>
