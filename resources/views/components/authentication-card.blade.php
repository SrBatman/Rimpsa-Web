<link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
<div id="particles-js"></div>
<div class="testowo min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div>
        {{ $logo }}
    </div>
     <h1 class="">¡Bienvenido!</h1>
     @if(Route::currentRouteName() == 'login') 
     <span> Inicia sesión en Rimpsa o <a href="{{route('register')}}" class="text-blue-500 underline">crea una cuenta</a> </span>
     @endif
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-dark dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
    
        {{ $slot }}
    </div>

    <div class="divider-wrapper">   
        <span class="divider">O</span>
    </div>
    <div class="social-section">
    <div class="mt-6">
            <x-button type="button" onclick="window.location=`{{ route('auth.twitter') }}`" class="btn-twitter text-white w-full flex items-center justify-center space-x-2" style="width: 445px;">
                <span class="social-logo-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                        <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                    </svg>
                </span>
                <span class="social-text">{{ __('Continuar con Twitter') }}</span>
            </x-button>
           
        </div>
        <div class="mt-6">
           
        <x-button type="button" onclick="window.location=`{{ route('auth.facebook') }}`" class="btn-facebook text-white w-full flex items-center justify-center space-x-2" style="width: 445px;">
                <span class="social-logo-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                    </svg>
                </span>
                <span class="social-text">{{ __('Continuar con Facebook') }}</span>
            </x-button>
           
        </div>

    </div>
    <div class="overlay"></div>
   
</div>

<script src="{{ asset('assets/js/particles.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>


