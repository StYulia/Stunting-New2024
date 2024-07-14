<section id="appointment" class="appointment section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Formulir Data Diri</h2>
        <p>Isi formulir berikut Untuk Melakukan Konsultasi Stunting</p>
    </div><!-- End Section Title -->
    
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <form action="{{ route('anak.store',) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-4 form-group">
                    <input type="text" name="nik" class="form-control" id="nik"
                        placeholder="NIK Anak / No KK" required="">
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nama Anak"
                        required="">
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir"
                        placeholder="Tanggal Lahir Anak" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group mt-3">
                    <select name="jk" id="jenis_kelamin" class="form-select" required="">
                        <option value="">Jenis Kelamin Anak</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="col-md-4 form-group mt-3">
                    <input type="tel" class="form-control" name="nohp_orangtua" id="telepon_orang_tua"
                        placeholder="Nomor Telepon Orang Tua" required="">
                </div>
                <div class="col-md-4 form-group mt-3">
                    <input type="number" name="tinggi" class="form-control" id="tinggi_badan"
                        placeholder="Tinggi Badan Anak (cm)" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group mt-3">
                    <input type="number" name="berat" class="form-control" id="berat_badan"
                        placeholder="Berat Badan Anak (kg)" required="">
                </div>
            </div>
            <div class="my-4">
                <button class="btn btn-primary" type="submit">Tambah Data</button>
                <a class="btn btn-outline-success" href="{{ route('anak.index') }}" >Gunakan Data Yang Sudah Ada</a>
            </div>
    </div>
    </form>
    </div>

</section><!-- /Appointment Section -->
