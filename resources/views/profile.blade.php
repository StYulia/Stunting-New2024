@extends('layouts.landing.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3 class="text-center">Data Profile</h3>
            </div>
        </div>
        @include('components.alert')
        <div class="card-body">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <form action="{{ route('profile.update') }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row mb-3">
                        <div class="col-md-4 form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" id="nik_anak"
                                placeholder="NIK Anak / No KK" value="{{auth()->user()->name}}" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" id="nik_anak"
                                placeholder="NIK Anak / No KK" required value="{{auth()->user()->email}}" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="">Fullname</label>
                            <input type="text" name="fullname" class="form-control" id="nik_anak"
                                placeholder="NIK Anak / No KK" value="{{auth()->user()->fullname}}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 form-group">
                            <label for="">Provinsi</label>
                            <select name="province_id" id="province_id" class="form-control" required>
                                <option selected value="{{$user->address->province->id}}">{{$user->address->province->name}}</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Kabupaten</label>
                            <select name="regency_id" id="regency_id" class="form-control" required>
                                <option selected value="{{$user->address->regency->id}}">{{$user->address->regency->name}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 form-group">
                            <label for="">Kecamatan</label>
                            <select name="district_id" id="district_id" class="form-control" required>
                                <option selected value="{{$user->address->district->id}}">{{$user->address->district->name}}</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Desa</label>
                            <select name="village_id" id="village_id" class="form-control" required>
                                <option selected value="{{$user->address->village->id}}">{{$user->address->village->name}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 container">
                        <textarea required name="alamat" id="" cols="30" rows="2" class="form-control">{{auth()->user()->alamat}}</textarea>
                    </div>
                    <div class="mb-3 mt-3">
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

  
    
<script>
    // Populate provinces dropdown on page load
    document.addEventListener('DOMContentLoaded', function () {
        fetchProvinces();
    });

    // Function to fetch provinces and populate dropdown
    function fetchProvinces() {
        fetch("{{ route('provinces') }}")
            .then(response => response.json())
            .then(data => {
                const provinceDropdown = document.getElementById('province_id');
                data.data.forEach(province => {
                    const option = document.createElement('option');
                    option.value = province.id;
                    option.textContent = province.name;
                    provinceDropdown.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching provinces:', error));
    }

    // Function to fetch regencies based on selected province
    document.getElementById('province_id').addEventListener('change', function () {
        const provinceId = this.value;
        fetchRegencies(provinceId);
    });

    function fetchRegencies(provinceId) {
        fetch(`/api/regency/${provinceId}`)
            .then(response => response.json())
            .then(data => {
                const regencyDropdown = document.getElementById('regency_id');
                regencyDropdown.innerHTML = '<option value="">Select Regency</option>';
                data.data.forEach(regency => {
                    const option = document.createElement('option');
                    option.value = regency.id;
                    option.textContent = regency.name;
                    regencyDropdown.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching regencies:', error));
    }

    // Function to fetch districts based on selected regency
    document.getElementById('regency_id').addEventListener('change', function () {
        const regencyId = this.value;
        fetchDistricts(regencyId);
    });

    function fetchDistricts(regencyId) {
        fetch(`/api/district/${regencyId}`)
            .then(response => response.json())
            .then(data => {
                const districtDropdown = document.getElementById('district_id');
                districtDropdown.innerHTML = '<option value="">Select District</option>';
                data.data.forEach(district => {
                    const option = document.createElement('option');
                    option.value = district.id;
                    option.textContent = district.name;
                    districtDropdown.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching districts:', error));
    }

    // Function to fetch villages based on selected district
    document.getElementById('district_id').addEventListener('change', function () {
        const districtId = this.value;
        fetchVillages(districtId);
    });

    function fetchVillages(districtId) {
        fetch(`/api/village/${districtId}`)
            .then(response => response.json())
            .then(data => {
                const villageDropdown = document.getElementById('village_id');
                villageDropdown.innerHTML = '<option value="">Select Village</option>';
                data.data.forEach(village => {
                    const option = document.createElement('option');
                    option.value = village.id;
                    option.textContent = village.name;
                    villageDropdown.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching villages:', error));
    }
</script>



@endsection

  



