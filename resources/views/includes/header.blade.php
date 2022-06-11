<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
          <svg class="poeziya-icon" xmlns="http://www.w3.org/2000/svg" width="9mm" height="9mm" viewBox="0 0 650 650">
            <path fill="var(--color-text)" stroke="var(--color-text)" stroke-width="0" d="M 5.18,643.91
                     C 13.65,651.13 96.03,587.60 186.50,518.00
                       403.33,577.67 748.00,148.00 617.27,26.39
                       492.25,-77.25 137.00,205.00 125.91,408.64
                       124.64,427.73 130.82,435.82 144.73,429.91
                       217.00,396.45 491.25,179.75 475.50,166.00
                       467.25,158.88 261.62,304.38 257.75,300.75
                       245.78,288.38 407.88,95.38 546.25,83.75
                       565.55,82.27 566.82,91.18 566.75,99.12
                       568.27,199.73 380.00,448.50 207.18,443.48
                       165.73,474.82 -5.91,630.64 5.36,644.64"></path>
          </svg> {{ config('app.name') }}
        </a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ active_link('home') }}" aria-current="page">
                        {{ __('Главная') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('blog') }}" class="nav-link {{ active_link('blog*') }}" aria-current="page">
                        {{ __('Блог') }}
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
              @unless (route_is('user*'))

              <li class="nav-item">

                <a href="{{ route('register') }}" class="nav-link {{ active_link('register') }}" aria-current="page">
                  {{ __('Регистрация') }}
                </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('login') }}" class="nav-link {{ active_link('login') }}" aria-current="page">
                    {{ __('Вход') }}
                  </a>
                </li>

                @else

                <li class="nav-item">
                  <a href="{{ route('logout') }}" class="nav-link" aria-current="page">
                    {{ __('Выход') }}
                  </a>
                </li>

                @endunless
            </ul>
        </div>
    </div>
</nav>
