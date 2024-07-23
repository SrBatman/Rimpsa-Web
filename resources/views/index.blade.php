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
                            Calidad y servicios <br> <strong>al mejor precio</strong>
                        </h2>
                    </div>
                    <div class="red-box-paragraph">
                        <p>Somos tu mejor opción si buscas calidad y precio en refacciones para Tractores, Maquinaria Agrícola, Industrial, Minera y mucho más. Somos distribuidores autorizados Carraro México, Corteco México, ZF México, Dana Spicer Méxcio, GTP México y Loctite México.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="third-section-right">
        <div class="black-rectangle-container">
            <div class="black-rentangle-box">
                <div class="clientes-container">
                    <div class="icon-clientes">

                        <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" fill="#781500" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                        </svg>
                    </div>
                    <div class="title-clientes">
                        <h3>Clientes</h3>
                        <p>Ofrecemos a nuestros clientes atención personalizada, asignándole a uno de nuestros agentes de ventas quien le dará seguimiento a sus necesidades y requerimientos.</p>
                    </div>

                </div>
                <div class="envios-container">
                    <div class="icon-envios">
                        <svg fill="#781500" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="60px" height="60px" viewBox="0 0 485.641 485.641" xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M467.44,109.264c-25.459-13.141-71.192-23.554-159.117,45.681c-19.059,15.009-107.356,81.918-125.079,98.352
			c-17.015,15.779-33.936,31.674-50.548,47.877c-3.772,3.681-7.544,7.362-11.305,11.056l-93.623-44.961
			c-8.075-3.884-18.044-1.745-23.735,5.635c-6.535,8.476-4.963,20.645,3.513,27.18l99.087,76.411
			c0.309,0.235,20.145,17.165,41.042,5.167c17.429-10.007,34.815-20.109,52.005-30.521c20.242-12.258,40.359-24.715,60.4-37.299
			c17.423-10.941,34.736-22.061,51.993-33.264l-4.554,54.834c-1,12.608,7.632,24.328,20.343,26.733
			c13.617,2.576,26.746-6.373,29.323-19.99l19.738-104.292c1.603-1.07,3.211-2.127,4.812-3.198
			c18.932-12.664,36.955-26.428,54.75-40.682C462.924,172.807,512.506,131.232,467.44,109.264z" />
                                    <path d="M173.896,216.962l34.464,1.797c23.886-18.829,54.341-42.175,74.378-57.595l-108.842,5.676
			c-12.628,0.704-23.079,10.836-23.753,23.755C149.421,204.435,160.055,216.24,173.896,216.962z" />
                                </g>
                            </g>
                        </svg>

                    </div>
                    <div class="title-envios">
                        <h3>Envios</h3>
                        <p>Hacemos envíos a toda la republica mexicana por la paquetería de su preferencia, contamos con alianza con PAQUETEXPRESS por lo cual sus envíos son más económicos por dicha paquetería.</p>
                    </div>

                </div>
                <div class="inventario-container">
                    <div class="icon-inventario">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" fill="#781500" class="bi bi-box-seam-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003zM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461z" />
                        </svg>

                    </div>
                    <div class="title-inventario">
                        <h3>Inventario</h3>
                        <p>Contamos con un gran stock de inventario, el cual vamos ampliando y mejorando día a día para cubrir las necesidades del mercado mundial actualmente.</p>
                    </div>

                </div>

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

</style>
<section class="fifth-section-index">
    <div class="fifth-container">
        <div class="card">
            <div class="content">
                <div class="filters-image">
                    <img src="{{ asset('assets/imgs/main/filters.jpg') }}" height="200px" width="300px" alt="imagen1">
                </div>
                <div class="btn-filter-black">
                    <span>FILTROS</span>
                </div>
            </div>
            <div class="hidden-content">
                <div class="filters-list">
                    <ul>
                        <li><i class="bi bi-shield-fill-check"></i> Filtros para vehículos pesados</li>
                        <li><i class="bi bi-shield-fill-check"></i> Filtros de cartucho</li>
                        <li><i class="bi bi-shield-fill-check"></i> Filtros de aire</li>
                        <li><i class="bi bi-shield-fill-check"></i> Filtros de agua</li>
                        <li><i class="bi bi-shield-fill-check"></i> Filtros de aceite</li>
                        <li><i class="bi bi-shield-fill-check"></i> Filtro de combustible</li>
                        <li><i class="bi bi-shield-fill-check"></i> Coladores y mucho más</li>
                    </ul>
                </div>
                <div class="red-filters-btn-box">
                <div class="red-box-tools">
                <span class="elementor-button-text">PORQUE NO SOLO ES COMPRAR UN FILTRO</span>
                </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="content">
                <div class="cutter-tools-image">
                    <img src="{{ asset('assets/imgs/main/imagen_pinzas.jpg') }}" height="200px" width="300px" alt="imagen2">
                </div>
                <div class="btn-cutter-tools-black">
                    <span class="btn-cutter-span">HERRAMIENTAS DE CORTE</span>
                </div>
            </div>
            <div class="hidden-content">
                <div class="filters-list">
                    <ul>
    
                        <li><i class="bi bi-shield-fill-check"></i> Cuchillas </li>
                        <li><i class="bi bi-shield-fill-check"></i> Gavilanes y porta gavilanes</li>
                        <li><i class="bi bi-shield-fill-check"></i> Punyas y adaptadores</li>
                        <li><i class="bi bi-shield-fill-check"></i> Picas</li>
                        <li><i class="bi bi-shield-fill-check"></i> Cucharones</li>
                        <li><i class="bi bi-shield-fill-check"></i>Escarificadores </li>
                    </ul>
                </div>
                <div class="red-filters-btn-box">
                <div class="red-box-tools">
                <span class="elementor-button-text">CONTAMOS CON LA GAMA MÁS COMPLETA EN HERRAMIENTA DE CORTE</span>
                </div>

                </div>

            </div>
        </div>

        <div class="card">
            <div class="content">
                <div class="hydraulic-image">
                    <img src="{{ asset('assets/imgs/main/bomba.webp') }}" height="200px" width="300px" alt="imagen2">
                </div>
                <div class="btn-hydraulic-black">
                    <span>SISTEMA HIDRÁULICO</span>
                </div>
            </div>
            <div class="hidden-content">
                <div class="filters-list">
                    <ul>
                        
                        <li><i class="bi bi-shield-fill-check"></i> Bombas hidráulicas </li>
                        <li><i class="bi bi-shield-fill-check"></i>   Repuestos para bombas</li>
                        <li><i class="bi bi-shield-fill-check"></i> Cilindros hidráulicos</li>
                        <li><i class="bi bi-shield-fill-check"></i>  Grupos rotatorios</li>
                        <li><i class="bi bi-shield-fill-check"></i> Flechas, barriles</li>
                        <li><i class="bi bi-shield-fill-check"></i> Kit de sellos para cilindros hidráulicos</li>
                        <li><i class="bi bi-shield-fill-check"></i>Válvulas y electro válvulas</li>
                    </ul>
                </div>
                <div class="red-filters-btn-box">
                    <div class="red-box-tools">
                    <span class="elementor-button-text">LA FUNCIÓN DEL SISTEMA HIDRÁULICO ES INCREMENTAR LA FUERZA DE LA MAQUINA</span>
                    </div>
               
                </div>

            </div>
        </div>
    </div>


</section>

<section class="sixth-section-index">
    <div class="sixth-container">
       <div class="sixth-box-inside">
        
       <div class="title-why-container">
            <h2>¿PORQUE COMPRAR EN RIMPSA? </h2>

        </div>
        <div class="text-reason-container">
            <div class="elementor-widget-container">
                Somos una distribuidora nacional de piezas nuevas y usadas de calidad para la línea completa de equipos CATERPILLAR, KOMATSU, CASE, CLARK-MICHIGAN, CUMINS ETC… En RIMPSA, no sólo ofrecemos piezas duraderas sino también un servicio excelente, ahorros increíbles y el respaldo que usted necesita para obtener sus órdenes rápida y eficientemente. 
            </div>
        </div>

       </div>
    </div>
</section>

<section class="seventh-section-index">
    <div class="seventh-section-left">
        <div class="my-solution-title">
            <h2>SOLUCION TOTAL</h2>
        </div>
        <div class="empaty-text-container">
            <div class="empaty-text">
            En RIMPSA comprendemos que proveer piezas de calidad es solo el primer paso; el segundo es proporcionar un servicio completo al cliente. 
            </div>
        </div>
        <div class="index-products-container">
            <img src="{{ asset('assets/imgs/main/varias-refacciones.jpg') }}" alt="">
        </div>

    </div>
    <div class="seventh-section-right">
      <div class="my-little-pony">
      <div class="service-pack-index">
            <h2>
            ESTE SERVICIO INCLUYE <br> LO SIGUIENTE:
            </h2>
        </div>
        <div class="services-list-included">
            <ul>
                <li><i class="bi bi-check-circle-fill"></i> Las cotizaciones se hacen el mismo día que se solicitan. </li>
                <li><i class="bi bi-check-circle-fill"></i> Un personal atento y bien entrenado, con experiencia en la industria de equipos pesados, listo para ofrecerle asistencia con cualquier información técnica que usted pueda necesitar.</li>
                <li><i class="bi bi-check-circle-fill"></i> Un inventario de piezas de repuesto nuevas y usadas adecuado a las necesidades del cliente ubicado en México y frontera.</li>
                <li><i class="bi bi-check-circle-fill"></i> Ahorros increíbles; de hasta el 50% y 70%. </li>
                <li><i class="bi bi-check-circle-fill"></i> Satisfacción total del cliente garantizado </li>
                <li><i class="bi bi-check-circle-fill"></i> Envíos urgentes a cualquier parte </li>
                <li><i class="bi bi-check-circle-fill"></i> Asesoría en cuanto a la paquetería para que el flete de sus envíos sea a bajos costos </li>
                <li><i class="bi bi-check-circle-fill"></i> Servicio preventa, pos venta</li>
                
            </ul>
        </div>
      </div>

    </div>

</section>

<section class="eighth-section-index">
    <div class="eighth-container">
    <h2 class="elementor-heading-title elementor-size-default">CONTAMOS CON REFACCIONES PARA MARCAS COMO</h2>
    </div>
</section>
<section class="ninth-section-index">
<div class="ninth-container">
    <div class="brands-text-uwu">
        <p>* Logotipos nombres y marcas son de sus respectivos dueños y son utilizadas únicamente con propósitos informativos.</p>
    </div>
    <div class="brands-image-container">
        <div class="first-brand">
            <img src="{{ asset('assets/imgs/case.jpg') }}" >

        </div>
        <div class="second-brand">
            <img src="{{ asset('assets/imgs/cat.jpg') }}" >
        </div>
    </div>


</div>

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