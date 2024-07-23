@extends('template')

@section('content')
<section class="first-section-about">
    <div class="text-about-container">
        <div class="another-about-me-box">
            <div class="rimpsa-about-name">
                <h1>RIMPSA</h1>
            </div>
            <div class="rimpsa-about-us-text">
                <h2>─ NOSOTROS ─</h2>
            </div>
            <div class="rimpsa-about-text-uwu">
                Nuestros valores y principios reflejan la empresa que aspiramos ser ya que estos son el fundamento de las decisiones de nuestro negocio. Es por ello que nuestra empresa a nivel global, se rige por lo mas altos estándares.
            </div>
        </div>


    </div>
</section>
<section class="second-section-about">

    <div class="gallery">
        <div class="container">
            <img src="{{ asset('assets/imgs/main/responsabilidad1.png') }}" width="100px" alt="Imagen 1" class="image">
            <div class="overlay">
                <i class="bi bi-check-circle-fill"></i>
                <p>Cuenta con 41 años de experiencia. Este conocimiento del mercado nos permite entregar las mejores soluciones en refacciones.</p>
            </div>
            <div class="about-secret-black">
                <h2>Experiencia</h2>
            </div>
        </div>
        <div class="container">
            <img src="{{ asset('assets/imgs/main/confianza.jpg') }}" width="100px" alt="Imagen 2" class="image">
            <div class="overlay">
                <i class="bi bi-people-fill"></i>
                <p>Trabajamos para generar, mantener e incrementar su confianza en nuestros productos, nuestros servicios y sobre todo en nosotros.</p>
            </div>
            <div class="about-secret-black">
                <h2>Confianza</h2>
            </div>
        </div>
        <div class="container">
            <img src="{{ asset('assets/imgs/main/comprmiso.webp') }}" width="100px" alt="Imagen 3" class="image">
            <div class="overlay">
                <i class="bi bi-person-raised-hand"></i>
                <p>Nuestra principal prioridad es cumplir con lo pactado con nuestros clientes, en el tiempo y modo acordado.</p>
            </div>

            <div class="about-secret-black">
                <h2>Compromiso</h2>
            </div>

        </div>
    </div>

</section>
<section class="third-section-about">
    <div class="third-left-side">
        <div class="idk-about">
            <div class="with-rimpsa-text">
                <h2>─ CON RIMPSA ─</h2>
            </div>
            <div class="info-about-rimpsa">
                <p>Se obtiene una oferta completa de alta calidad, tecnologías de vanguardia diseñadas en cada repuesto y componentes de sellado y diseñados para prosperar en entornos de trabajo exigentes. De corte metalurgia borde en el interior para recubrimientos especializados en el exterior, los componentes se infunden con tecnologías avanzadas. Los conceptos de ingeniería premiados detrás de estas piezas ofrecen la solución de problemas beneficios que usted puede confiar.</p>
            </div>
        </div>


    </div>
    <div class="third-right-side">

    </div>

</section>
<section class="fourth-section-about">
    <div class="fourth-left-side">
        <div class="container-jiji">
            <div class="title-about-unu" id="amazing-title1" onclick="toggleContent('content1', 'amazing-title1')">NUESTRA VISIÓN</div>
            <div class="contenido-about" id="content1">Ofrecer un excelente servicio y ser la compañía líder en el suministro de refacciones para maquinaria pesada como resultado, esta empresa se posicionara a nivel nacional como una de las principales distribuidoras de reemplazo.</div>

            <div class="title-about-unu" id="amazing-title2" onclick="toggleContent('content2', 'amazing-title2')">NUESTRA SOLUCIÓN</div>
            <div class="contenido-about" id="content2">Nos enfocamos en proveer piezas de alta calidad a un precio excepcional. Nuestras piezas son sometidas a procedimientos de inspección rigurosos que nos permiten garantizar la calidad del producto.</div>

            <div class="title-about-unu" id="amazing-title3" onclick="toggleContent('content3', 'amazing-title3')">NUESTROS SERVICIOS </div>
            <div class="contenido-about" id="content3">Todos nuestros servicios de Refacciones, nuevas, usadas de reemplazo y remanufacturadas, junto con nuestra capacidad de reparación y reconstrucción y distribucion, se concentra en un objetivo en común: asegurar que no dejamos nunca de proveerle valor después de la venta. </div>
        </div>
    </div>
    <div class="fourth-right-side">
        <div class="vision-container">
            <img src="{{ asset('assets/imgs/main/vision.jpg') }}" width="317" height="550" alt="">
            <div>Visión</div>
        </div>
        <div class="solution-container">
            <img src="{{ asset('assets/imgs/main/soluciones.jpg') }}" width="317" height="550" alt="">
            <div>Solución</div>
        </div>
        <div class="service-container">
            <img src="{{ asset('assets/imgs/main/serviciosuwu.jpg') }}" width="317" height="550" alt="">
            <div>Servicios</div>
        </div>




    </div>

</section>
<script>
    function toggleContent(contentId, titleId) {
        let contents = document.getElementsByClassName('contenido-about');
        let titles = document.getElementsByClassName('title-about-unu');
        let clickedContent = document.getElementById(contentId);
        let titleAbout = document.getElementById(titleId);

        // Verificar si el contenido clickeado está visible
        let isVisible = clickedContent.style.display === 'block';

        // Cerrar todos los contenidos
        for (let i = 0; i < contents.length; i++) {
            contents[i].style.display = 'none';
            titles[i].style.color = "#000";
        }

        // Mostrar u ocultar el contenido clickeado basado en su estado anterior
        if (!isVisible) {
            clickedContent.style.display = 'block';
            titleAbout.style.color = "#781500";
            console.log(titleAbout);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        let contents = document.getElementsByClassName('contenido-about');
        let titles = document.getElementsByClassName('title-about-unu');

        for (let i = 0; i < contents.length; i++) {
            if (i === 0) {
                titles[i].style.color = "#781500";
                contents[i].style.display = 'block';
            } else {
                contents[i].style.display = 'none';
            }

        }
    });
</script>
@endsection