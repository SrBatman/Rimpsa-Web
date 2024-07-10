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
                    ESPECIALISTAS EN <b>EJES DELANTEROS</b> DOBLE TRACCIÓN.
                </h2>

            </div>
            <div class="yellow-second-text">
                <p>
                    Tenemos la distribución autorizada de las mejores marcas. Refacciones Dana Spicer, Refacciones Carraro, Refacciones Corteco, Refacciones ZF Refacciones GTP y Refacciones Loctite ¡Somos 100% original!
                </p>

            </div>

        </div>
        <div class="yellow-buttons-container">
            <button onclick="window.location=`{{ route('contacto') }}`" class="btn-contact-black">Contactar</button>
            <button onclick="window.location=`{{ route('tienda') }}`" class="btn-contact-yellow">Catalogos</button>
        </div>
    </div>
    <div class="white-element-container">
        <div class="white-text-container">
            <div class="white-icon-rimpsa">
                <img src="{{ asset('assets/imgs/main/logo_blanco.jpg') }}" alt="maquinaria" height="160px" width="300px">
            </div>
            <div class="quality-and-service-container">
                <div class="abcde">
                    <div class="rimpsa-text-index">
                        <h2>
                            RIMPSA
                        </h2>
                    </div>
                    <div class="quality-and-service-text">
                        <h2>Calidad y Servicio al mejor precio </h2>
                    </div>
                    <div class="last-quality-text">
                        <p>
                            Nuestros valores y principios reflejan la empresa que aspiramos ser ya que estos son el fundamento de las decisiones de nuestro negocio. Es por ello que nuestra empresa a nivel global, se rige por lo mas altos estándares.
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </div>

</section>

<section class="third-section-index">
    <div class="third-section-left">
        <div class="mini-red-box-container">
            <div class="the-mini-red-box">
                <div class="mini-red-box-content">
                    <div class="red-box-title">
                        <h2>
                            Calidad y servicios <br>al mejor precio
                        </h2>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="third-section-right">
        <div class="black-rectangle-container">
            <div class="black-rentangle-box">

            </div>

        </div>

    </div>
</section>

<section class="fourth-section-index">
    <div class="solutions-container-owo">
        <div class="solution-text">
            <h2>SOLUCIONES </h2>
        </div>
        <div class="solutions-text">
            <p>En Rimpsa somos distribuidores autorizados de las marcas más prestigiosas del mercado como lo son Dana, Dana Spicer, Carraro, GTP, ZF y Loctite.</p>
        </div>
    </div>

</section>
<style>
    .card {
        width: 200px;
        height: 200px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        border-radius: 10px;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        position: relative;
    }

    .card:hover {
        width: 400px;
        height: 400px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .content {
        padding: 20px;
        transition: opacity 0.3s ease-in-out;
    }

    .card:hover .content {
        opacity: 1;
    }

    .hidden-content {
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
        position: absolute;
        bottom: 20px;
        left: 20px;
        right: 20px;
    }

    .card:hover .hidden-content {
        opacity: 1;
    }
</style>
<section class="fifth-section-index">
    <div class="card">
        <div class="content">
            <h2>Título</h2>
            <p>Contenido inicial de la carta...</p>
        </div>
        <div class="hidden-content">
            <p>Contenido adicional que se muestra al pasar el cursor...</p>
        </div>
    </div>

</section>

<section class="sixth-section-index">

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