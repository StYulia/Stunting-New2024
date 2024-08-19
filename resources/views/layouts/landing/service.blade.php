<section id="services" class="services section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Layanan</h2>
        <p>Kami menyediakan berbagai layanan untuk membantu dalam pencegahan dan penanganan stunting.</p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <a href="{{ route('anak.index') }}" class="stretched-link">
                        <h3>Konsultasi Kesehatan</h3>
                    </a>
                    <p>Kami menawarkan layanan konsultasi yang dirancang khusus untuk membantu mengidentifikasi diagnosa stunting pada anak.</p>
                </div>
            </div><!-- End Service Item -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-item position-relative">
                    <div class="icon">
                        <i class="fas fa-pills"></i>
                    </div>
                    <button  class="btn btn" type="button" data-bs-toggle="modal" data-bs-target="#chatbotModal">
                        <h3>Chatbot Interaktif</h3>
                    </button>
                    <p>Kami menyediakan layanan interaktif chatbot yang dapat membantu anda untuk meningkatkan informasi dan pengetahuan terkait pencegahan stunting.</p>
                </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-item position-relative">
                    <div class="icon">
                        <i class="fas fa-hospital-user"></i>
                    </div>
                    <a href="{{ route('anak.index') }}" class="stretched-link">
                        <h3>History Konsultasi</h3>
                    </a>
                    <p>Kami menawarkan layanan untuk melihat riwayat konsultasi dalam diagnosis stunting untuk memantau perkembangan diagnosa pada anak.</p>
                </div>
            </div><!-- End Service Item -->
        </div>

    </div>

</section><!-- /Services Section -->
