@props(['active' => null])

<header data-scroll-navigation class="sticky top-0 z-50 border-b border-ink/5 bg-white/95 backdrop-blur transition-transform duration-300 motion-reduce:transition-none">
    <div class="mx-auto flex w-full max-w-[1440px] flex-col gap-3 px-6 py-3 lg:flex-row lg:items-center lg:justify-between sm:px-10 lg:px-16">
        <div class="flex items-center justify-between gap-4">
            <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-2" aria-label="La crèche d'ilarraza, inicio">
                <span class="flex size-10 items-center justify-center overflow-hidden rounded-full border border-ink/5 bg-white sm:size-11">
                    <img src="{{ asset('images/logo school reversecolors.jpg') }}" alt="" class="size-full rounded-full object-contain">
                </span>
                <span class="school-wordmark whitespace-nowrap font-display text-sm font-semibold sm:text-base">La Crèche D'Ilarraza</span>
            </a>
            <a href="{{ route('login') }}" class="inline-flex shrink-0 items-center gap-2 rounded-full border border-ink/15 px-3 py-2 text-xs font-semibold transition-colors hover:border-ink hover:bg-ink hover:text-white lg:hidden">
                Acceder
                <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="M4.5 10h10m-4-4 4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>

        <nav class="flex gap-5 overflow-x-auto pb-1 text-xs font-medium text-muted sm:justify-center sm:gap-6 sm:pb-0 sm:text-sm" aria-label="Navegación principal">
            <a href="{{ route('home') }}" @class(['shrink-0 transition-colors hover:text-ink', 'font-semibold text-ink' => $active === 'home']) @if ($active === 'home') aria-current="page" @endif>La escuela</a>
            <a href="{{ route('learning') }}" @class(['shrink-0 transition-colors hover:text-ink', 'font-semibold text-ink' => $active === 'learning']) @if ($active === 'learning') aria-current="page" @endif>Nuestra forma de aprender</a>
            <a href="{{ route('contact') }}" @class(['shrink-0 transition-colors hover:text-ink', 'font-semibold text-ink' => $active === 'contact']) @if ($active === 'contact') aria-current="page" @endif>Contacto</a>
            <a href="{{ route('rentals.index') }}" class="shrink-0 transition-colors hover:text-ink">Rentas</a>
        </nav>

        <a href="{{ route('login') }}" class="hidden shrink-0 items-center gap-2 rounded-full border border-ink/15 px-4 py-2.5 text-xs font-semibold transition-colors hover:border-ink hover:bg-ink hover:text-white lg:inline-flex">
            Iniciar sesión
            <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                <path d="M4.5 10h10m-4-4 4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    </div>
</header>
