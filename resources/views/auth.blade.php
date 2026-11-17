@extends('layouts.app')

@php($isRegister = request()->routeIs('register'))

@section('title', $isRegister ? "Crear cuenta — La Crèche D'Ilarraza" : "Iniciar sesión — La Crèche D'Ilarraza")

@section('content')
    <main class="flex min-h-screen items-center justify-center bg-[#f0eff7] p-4 sm:p-8">
        <div class="grid w-full max-w-6xl overflow-hidden rounded-[2rem] bg-white shadow-[0_24px_80px_rgba(27,51,112,0.18)] lg:min-h-[680px] lg:grid-cols-2">
            <section class="auth-grid-pattern relative isolate flex min-h-[330px] flex-col justify-between overflow-hidden bg-[#e3e7f4] p-7 text-[#292c40] sm:min-h-[390px] sm:p-10 lg:min-h-[680px] lg:p-12" aria-labelledby="academy-title">
                <div class="pointer-events-none absolute -left-20 -top-28 z-0 size-80 rounded-full bg-cyan-300/20 blur-3xl" aria-hidden="true"></div>
                <div class="pointer-events-none absolute -bottom-36 -right-20 z-0 size-96 rounded-full bg-violet-400/20 blur-3xl" aria-hidden="true"></div>

                <div class="relative z-10 flex items-center justify-between gap-4">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.16em] text-[#41465f] transition-colors hover:text-ink">
                        <span class="text-lg" aria-hidden="true">✳</span>
                        La Más Mejor
                    </a>
                </div>

                <div class="relative z-10 flex flex-col gap-5 py-10 lg:py-0">
                    <p class="text-sm font-medium text-[#41465f]">
                        {{ $isRegister ? 'Tu próxima aventura empieza aquí' : 'Qué bueno tenerte de vuelta' }}
                    </p>
                    <h1 id="academy-title" class="academy-title-fill font-display text-4xl font-semibold leading-[1.12] tracking-[-0.08em] sm:text-5xl xl:text-[3.6rem]" style="--academy-title-image: url('{{ asset('images/reflexlavalamp.gif') }}'); background-image: var(--academy-title-image, linear-gradient(135deg, #d9f36a, #f6b9a2, #ffffff)); background-position: center; background-size: cover; background-clip: text; -webkit-background-clip: text; color: transparent; -webkit-text-fill-color: transparent;">
                        LA CRÈCHE<br>
                        D'ILARRAZA
                    </h1>
                    <p class="max-w-sm text-sm leading-6 text-[#41465f] sm:text-base">
                        Un lugar para hacer preguntas grandes, probar ideas y crecer a tu manera.
                    </p>
                </div>

                <div class="relative z-10 flex items-center gap-3 text-xs font-medium text-[#71778d]">
                    <span class="h-px w-9 bg-[#a7aec4]"></span>
                    Leo, ¿y la bebé?
                </div>
            </section>

            <section class="flex items-center justify-center px-6 py-10 sm:px-12 sm:py-14 lg:px-14" aria-labelledby="form-title">
                <div class="w-full max-w-md">
                    <a href="{{ route('home') }}" class="mb-9 inline-flex items-center gap-2 text-sm font-medium text-muted transition-colors hover:text-ink">
                        <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M15.5 10h-11m4 4-4-4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Volver al Inicio
                    </a>

                    <div class="mb-8">
                        <p class="mb-2 text-xs font-bold uppercase tracking-[0.16em] text-violet">La crèche d'ilarraza</p>
                        <h2 id="form-title" class="font-display text-2xl font-semibold tracking-[-0.06em] sm:text-3xl">
                            {{ $isRegister ? 'Crear una cuenta' : 'Iniciar sesión' }}
                        </h2>
                        <p class="mt-3 text-sm leading-6 text-muted">
                            {{ $isRegister ? 'Completa tus datos para crear tu perfil de la escuela.' : 'Ingresa tus datos para continuar tu camino.' }}
                        </p>
                    </div>

                    <nav class="mb-7 grid grid-cols-2 rounded-xl bg-paper p-1" aria-label="Acceso">
                        <a href="{{ route('login') }}" @class([
                            'rounded-lg px-3 py-2.5 text-center text-sm font-semibold transition-colors',
                            'bg-white text-ink shadow-sm' => ! $isRegister,
                            'text-muted hover:text-ink' => $isRegister,
                        ]) @if(! $isRegister) aria-current="page" @endif>
                            Iniciar sesión
                        </a>
                        <a href="{{ route('register') }}" @class([
                            'rounded-lg px-3 py-2.5 text-center text-sm font-semibold transition-colors',
                            'bg-white text-ink shadow-sm' => $isRegister,
                            'text-muted hover:text-ink' => ! $isRegister,
                        ]) @if($isRegister) aria-current="page" @endif>
                            Crear cuenta
                        </a>
                    </nav>

                    <form action="{{ $isRegister ? route('register') : route('login') }}" method="POST" data-auth-form>
                        @csrf

                        @if($isRegister)
                            <div class="mb-5">
                                <label for="name" class="mb-2 block text-sm font-semibold">Nombre completo</label>
                                <input id="name" name="name" type="text" autocomplete="name" required minlength="2" maxlength="80" placeholder="Tu nombre" class="w-full rounded-xl border border-ink/15 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-muted/65 focus:border-violet focus:ring-4 focus:ring-violet/10">
                            </div>
                        @endif

                        <div class="mb-5">
                            <label for="email" class="mb-2 block text-sm font-semibold">Correo electrónico</label>
                            <input id="email" name="email" type="email" autocomplete="email" required maxlength="254" placeholder="nombre@ejemplo.com" class="w-full rounded-xl border border-ink/15 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-muted/65 focus:border-violet focus:ring-4 focus:ring-violet/10">
                        </div>

                        <div @class(['mb-5' => $isRegister, 'mb-7' => ! $isRegister])>
                            <label for="password" class="mb-2 block text-sm font-semibold">Contraseña</label>
                            <input id="password" name="password" type="password" autocomplete="{{ $isRegister ? 'new-password' : 'current-password' }}" required minlength="8" maxlength="64" @if($isRegister) data-password @endif placeholder="{{ $isRegister ? 'Al menos 8 caracteres' : 'Tu contraseña' }}" class="w-full rounded-xl border border-ink/15 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-muted/65 focus:border-violet focus:ring-4 focus:ring-violet/10">
                        </div>

                        @if($isRegister)
                            <div class="mb-7">
                                <label for="password-confirmation" class="mb-2 block text-sm font-semibold">Confirmar contraseña</label>
                                <input id="password-confirmation" name="password_confirmation" type="password" autocomplete="new-password" required minlength="8" maxlength="64" data-password-confirmation placeholder="Repite tu contraseña" class="w-full rounded-xl border border-ink/15 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-muted/65 focus:border-violet focus:ring-4 focus:ring-violet/10">
                            </div>
                        @endif

                        <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-violet px-5 py-3.5 text-sm font-bold text-white transition-colors hover:bg-ink focus:outline-none focus:ring-4 focus:ring-violet/20">
                            {{ $isRegister ? 'Crear cuenta' : 'Entrar a mi cuenta' }}
                            <span aria-hidden="true">↗</span>
                        </button>
                        <p class="mt-4 min-h-5 text-center text-xs text-muted" role="status" aria-live="polite" data-form-status>
                            Solo validamos los campos; el acceso todavía no está conectado.
                        </p>
                    </form>

                    <p class="mt-5 text-center text-xs leading-5 text-muted">
                        Esta es una interfaz de demostración. Tus datos no se guardan ni se envían.
                    </p>
                </div>
            </section>
        </div>
    </main>
@endsection
