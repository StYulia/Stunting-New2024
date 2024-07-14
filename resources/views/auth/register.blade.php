@extends('layouts.auth')

@section('title', 'Register')

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Register</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('register.post') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="name">Username</label>
                    <input id="name" type="text" class="form-control" name="name" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                        Please fill in your name username
                    </div>
                </div>

                <div class="form-group">
                    <label for="name">FullName</label>
                    <input id="name" type="text" class="form-control" name="fullname" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                        Please fill in your name
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="2" required>
                    <div class="invalid-feedback">
                        Please fill in your email
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password" tabindex="3" required>
                    <div class="invalid-feedback">
                        Please fill in your password
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Password Confirmation</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" tabindex="4" required>
                    <div class="invalid-feedback">
                        Please fill in your password confirmation
                    </div>
                </div>

                <div class="form-group">
                    <label for="province_id">Province</label>
                    <select id="province_id" class="form-control" name="province_id" tabindex="5" required>
                        <option value="">Select Province</option>
                        <!-- Options will be populated dynamically via JavaScript -->
                    </select>
                    <div class="invalid-feedback">
                        Please select a province
                    </div>
                </div>

                <div class="form-group">
                    <label for="regency_id">Regency</label>
                    <select id="regency_id" class="form-control" name="regency_id" tabindex="6" required>
                        <option value="">Select Regency</option>
                        <!-- Options will be populated dynamically via JavaScript -->
                    </select>
                    <div class="invalid-feedback">
                        Please select a regency
                    </div>
                </div>

                <div class="form-group">
                    <label for="district_id">District</label>
                    <select id="district_id" class="form-control" name="district_id" tabindex="7" required>
                        <option value="">Select District</option>
                        <!-- Options will be populated dynamically via JavaScript -->
                    </select>
                    <div class="invalid-feedback">
                        Please select a district
                    </div>
                </div>

                <div class="form-group">
                    <label for="village_id">Village</label>
                    <select id="village_id" class="form-control" name="village_id" tabindex="8" required>
                        <option value="">Select Village</option>
                        <!-- Options will be populated dynamically via JavaScript -->
                    </select>
                    <div class="invalid-feedback">
                        Please select a village
                    </div>
                </div>

                <div class="form-group">
                    <label for="name">Address</label>
                    <textarea id="name" type="text" class="form-control" name="alamat" tabindex="1" required autofocus></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="9">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="text-muted mt-5 text-center">
        Already have an account? <a href="{{ route('login') }}">Login</a>
    </div>
@endsection

@push('scripts')
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
                    provinceDropdown.innerHTML = '<option value="">Select Province</option>';
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
@endpush
