@include('frontOffice.partials.head')
<body>
    @include('frontOffice.partials.nav')

    <section class="" id="landscape-image">
        <div alt="Portada" class="landscape-file img-fluid"></div>

        <div class="image-text">
            <h1>Bienvenido a mi sitio web</h1>
            <p>Este es un sitio web impresionante que he creado con HTML, CSS y Bootstrap.</p>
            <a href="#" class="btn btn-primary btn-lg">¡Comencemos!</a>
        </div>
    </section>

    <!-- Características -->
    <section class="features-section">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="feature col-md-3">
                    <div class="feature-item text-center">
                        <div class="feature-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h3>Global Reach</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla laoreet, erat in auctor efficitur,
                        tortor ipsum aliquam purus.</p>
                    </div>
                </div>
                <div class="feature col-md-3">
                    <div class="feature-item text-center">
                        <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                        </div>
                        <h3>24/7 Support</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla laoreet, erat in auctor efficitur,
                        tortor ipsum aliquam purus.</p>
                    </div>
                </div>
                <div class="feature col-md-3">
                    <div class="feature-item text-center">
                        <div class="feature-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3>Customer Love</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla laoreet, erat in auctor efficitur,
                        tortor ipsum aliquam purus.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About -->
    <section class="about-section mt-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="https://via.placeholder.com/600x400" alt="About Image" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <div class="about-content">
                        <h2>About Us</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla laoreet, erat in auctor efficitur,
                        tortor ipsum aliquam purus, vel ullamcorper urna lectus sit amet neque. Aliquam dictum elit est, eget
                        bibendum tortor venenatis ac. Nunc sit amet mi nibh. Aliquam blandit vestibulum leo eget vehicula.
                        Donec ut semper tortor, vel malesuada odio. Suspendisse quis ante eros. Curabitur eget metus at mi
                        rhoncus malesuada non eget ex. Duis auctor felis quis nibh placerat posuere.</p>
                        <p>Etiam eu malesuada dolor, eu sollicitudin leo. Vestibulum ante ipsum primis in faucibus orci luctus et
                        ultrices posuere cubilia Curae; Duis malesuada laoreet quam. Integer sagittis nibh sed massa faucibus,
                        at fringilla arcu pharetra. Nam posuere justo vel risus accumsan euismod. Maecenas in turpis urna.
                        Praesent et urna velit. Sed pellentesque tincidunt orci, vitae rhoncus dolor volutpat a. Etiam eget
                        mi orci. </p>
                        <button class="btn btn-primary">Learn More</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontOffice.partials.footer')

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>