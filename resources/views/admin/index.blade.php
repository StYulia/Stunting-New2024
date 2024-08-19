@extends('layouts.app')

@section('title', 'Default Layout')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Selamat datang {{ auth()->user()->name }}</h2>

                <div class="card">
                    <div class="card-header">
                        <h4>Stunting Anak Berdasarkan Desa</h4>
                    </div>
                    <div class="card-body">
                        @php
                            $currentDate = \Carbon\Carbon::now();
                            $twoMonthsAgo = $currentDate->copy()->subMonths(2);
                        @endphp
                        <p> Periode: {{ $twoMonthsAgo->format('d M Y') }} - {{ $currentDate->format('d M Y') }}</p>
                        <canvas id="stuntingChart" width="400" height="200"></canvas>
                    </div>
                    <div class="card-footer bg-whitesmoke">
                        This is card footer
                    </div>
                </div>
            </div>
        </section>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const labels = {!! json_encode($stuntingCounts->pluck('village_name')) !!};
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Kasus Stunting',
                    data: {!! json_encode($stuntingCounts->pluck('stunting_count')) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            const stuntingChart = new Chart(
                document.getElementById('stuntingChart'),
                config
            );
        });
    </script>
    @endpush
@endsection
