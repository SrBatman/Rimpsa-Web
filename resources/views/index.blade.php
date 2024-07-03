@extends('template')

@section('content')

<section class="my-header-section">
    <div class="image-animated">
        <div class="left-side-header">
            <div class="left-box-cute">
            <div class="specialist-text">
                <h2 class="typewritten" id="typewritten">
                </h2>
            </div>
            <div class="spare-parts-text">
                <h2>REFACCIONES PARA MAQUINARIA</h2>
            </div>
            <div class="quality-text">
                <h2>
                    ALTA CALIDAD Y TECNOLOGÍA DE VANGUARDIA
                </h2>
            </div>
            </div>

        </div>
        <div class="right-side-header">
        <div class="right-box-cute">
        <div class="certificate-container">
                <img src="{{ asset('assets/imgs/main/CERTIFICATE.png') }}" alt="maquinaria" height="88px" width="88px">
            </div>
            <div class="texts-certificate">
                <div class="provider-text">
                    <h2>SOMOS DISTRIBUIDORES</h2>
                </div>
                <div class="authorizated-text">
                    <h2>AUTORIZADOS</h2>
                </div>
            </div>
                </div>
 
        </div>
    </div>

</section>
<section class="second-section-index">
    <div class="yellow-element-container">
        <div class="yellow-text-container">
            <div class="yellow-first-text">
                <h2>
                ESPECIALISTAS EN EJES DELANTEROS DOBLE TRACCIÓN.
                </h2>

            </div>
            <div class="yellow-second-text">
                <p>
                Tenemos la distribución autorizada de las mejores marcas. Refacciones Dana Spicer, Refacciones Carraro, Refacciones Corteco, Refacciones ZF Refacciones GTP y Refacciones Loctite ¡Somos 100% original!
                </p>

            </div>

        </div>
        <div class="yellow-buttons-container">
            <button>Contactar</button>
            <button>Catalogos</button>
        </div>
    </div>
    <div class="white-element-container">

    </div>

</section>

<section class="third-section-index">

</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var headerSection = document.querySelector('.image-animated');
        var animations = ['slide1', 'slide2', 'slide3', 'slide4', 'slide5'];
        var randomAnimation = animations[Math.floor(Math.random() * animations.length)];

        // Remueve la animación inicial y añade la animación aleatoria
        headerSection.style.animation = 'none'; // Remueve cualquier animación inicial si la hay
        void headerSection.offsetWidth; // Reinicia el offsetWidth para aplicar la animación aleatoria
        headerSection.style.animation = randomAnimation + ' 1s ease-in-out';
    });
</script>

<script>
    const text = "ESPECIALISTAS EN";
    const typewriter = document.getElementById("typewritten");
    let index = 0;

    function typeText() {
        if (index < text.length) {
            typewriter.textContent += text.charAt(index);
            index++;
            setTimeout(typeText, 70); // Ajusta la velocidad aquí (en milisegundos)
        }
    }
    setTimeout(typeText, 1000); // Ajusta el tiempo de espera aquí (en milisegundos)
</script>
@endsection