@extends('template')

@section('content')
<section class="contact-info">
    <div class="container-text-info">
        <div class="contact-mini-box">
            <div class="contact-rimpsa-name">
                <h1>RIMPSA</h1>

            </div>
            <div class="contact-text-contactenos">

                <h2>
                    ─ CONTÁCTENOS─
                </h2>
            </div>
            <div class="contact-text-relleno">
                Contamos con personal altamente calificado en las áreas administrativas, comerciales y de operaciones, con capacitación constante y comprometidos con el servicio de calidad que se debe brindar a cada cliente.
            </div>
        </div>

    </div>

</section>
<section class="contact-form-users">
    <div class="contact-form-container">
        <div class="contact-form-box">
            <div class="contact-mini-mini-box">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="empresa" placeholder="Empresa">
                        <input type="text" name="ruc" placeholder="RUC">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nombre" placeholder="Nombre y Apellidos" style="width: 100%;">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email">
                        <input type="text" name="telefono" placeholder="Teléfono">
                    </div>
                    <div class="form-group">
                        <textarea name="mensaje" placeholder="Detalle del mensaje"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit">Enviar información</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="contact-information-box">
            <div class="text-location">
                <h1>Ubíquenos</h1>
            </div>
            <div class="address-text">
                <ul>
                    <i class="bi bi-geo-alt-fill">
                        <span style="color: white;">Sucursal: Calle 59d No. 419 Fraccionamiento Nora Quintana Merida yucatan</span>
                    </i>
                </ul>
            </div>
            <!-- <div class="google-maps-button-container">
                   <button type="button"></button>
            </div> -->
            <div class="google-maps-frame">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.000217754321!2d-89.67443382412824!3d20.992628389017458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f56737cae8b7b73%3A0x1d1d3428aa5f0c87!2sC.%2059%E1%B4%B0%20418%2C%20Nora%20Quintana%2C%2097238%20M%C3%A9rida%2C%20Yuc.!5e0!3m2!1ses-419!2smx!4v1719856925202!5m2!1ses-419!2smx" width="80%" height="300px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
    </div>

</section>

@endsection