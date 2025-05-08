@extends('main')
<style>
    .bg-green{
        background-color: #BBF246 !important;
        color: #000;
    }
</style>
@section('content')
<div class="container-fluid py-2 mt-2">
    <div class="row">
      <div class="ms-3">
        <h3 class="mb-0 h4 font-weight-bolder">Laporan Kehadiran</h3>
      </div>
    </div>
    <div class="row">

        <div class="col-lg-6 col-md-6 mt-4 mb-4">
            <div class="card">
              <div class="card-body">
                <h6 class="mb-0 ">Harian</h6>
                <p class="text-sm ">Laporan kehadiran member gym harian</p>
                <div class="pe-2">
                  <div class="chart">
                    <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                  </div>
                </div>
                <hr class="dark horizontal">
              </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 mt-4 mb-4">
            <div class="card">
              <div class="card-body">
                <h6 class="mb-0 ">Bulanan</h6>
                <p class="text-sm ">Laporan kehadiran member gym bulanan</p>
                <div class="pe-2">
                  <div class="chart">
                    <canvas id="chart-bars-month" class="chart-canvas" height="170"></canvas>
                  </div>
                </div>
                <hr class="dark horizontal">
              </div>
            </div>
        </div>
    </div>
    <div class="card p4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-green shadow-dark border-radius-lg pt-4 pb-3">
                          <h6 class="text-capitalize ps-3">Kehadiran Member</h6>
                        </div>
                      </div>
                      <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                          <table class="table align-items-center mb-0">
                            <thead>
                              <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Member</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jam Checkin</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jam Checkout</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Member Sejak</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Member Selesai</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                  <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                      <h6 class="mb-0 text-sm">Sulthon Auliya</h6>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">10:00 AM</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">13:00 PM</p>
                                </td>
                                <td class="align-middle text-center">
                                  <span class="text-secondary text-xs font-weight-bold">23/04/2025</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">23/07/2025</span>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                      <h6 class="mb-0 text-sm">Bagus Nur</h6>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">07:00 AM</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">10:00 AM</p>
                                </td>
                                <td class="align-middle text-center">
                                  <span class="text-secondary text-xs font-weight-bold">01/01/2025</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">01/06/2025</span>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                      <h6 class="mb-0 text-sm">Wira Sanjaya</h6>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">08:00 AM</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">11:00 AM</p>
                                </td>
                                <td class="align-middle text-center">
                                  <span class="text-secondary text-xs font-weight-bold">23/04/2025</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">23/07/2025</span>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                      <h6 class="mb-0 text-sm">Ricky Octavia</h6>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">17:00 PM</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">20:00 PM</p>
                                </td>
                                <td class="align-middle text-center">
                                  <span class="text-secondary text-xs font-weight-bold">23/04/2025</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">23/07/2025</span>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                      <h6 class="mb-0 text-sm">Faiz Faisal</h6>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">20:00 PM</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">22:00 PM</p>
                                </td>
                                <td class="align-middle text-center">
                                  <span class="text-secondary text-xs font-weight-bold">23/04/2025</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">23/07/2025</span>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"],
                datasets: [{
                label: "Views",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "#BBF246",
                data: [50, 45, 22, 28, 50, 60, 76],
                barThickness: 'flex'
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                legend: {
                    display: false,
                }
                },
                interaction: {
                intersect: false,
                mode: 'index',
                },
                scales: {
                y: {
                    grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: '#e5e5e5'
                    },
                    ticks: {
                    suggestedMin: 0,
                    suggestedMax: 500,
                    beginAtZero: true,
                    padding: 10,
                    font: {
                        size: 14,
                        lineHeight: 2
                    },
                    color: "#737373"
                    },
                },
                x: {
                    grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                    borderDash: [5, 5]
                    },
                    ticks: {
                    display: true,
                    color: '#737373',
                    padding: 10,
                    font: {
                        size: 14,
                        lineHeight: 2
                    },
                    }
                },
                },
            },
        });
        var ctx2 = document.getElementById("chart-bars-month").getContext("2d");

        new Chart(ctx2, {
            type: "bar",
            data: {
                labels: ["Januari", "Februari", "Maret", "April", "Mei"],
                datasets: [{
                label: "Views",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "#BBF246",
                data: [350, 145, 226, 280, 350],
                barThickness: 'flex'
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                legend: {
                    display: false,
                }
                },
                interaction: {
                intersect: false,
                mode: 'index',
                },
                scales: {
                y: {
                    grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: '#e5e5e5'
                    },
                    ticks: {
                    suggestedMin: 0,
                    suggestedMax: 500,
                    beginAtZero: true,
                    padding: 10,
                    font: {
                        size: 14,
                        lineHeight: 2
                    },
                    color: "#737373"
                    },
                },
                x: {
                    grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                    borderDash: [5, 5]
                    },
                    ticks: {
                    display: true,
                    color: '#737373',
                    padding: 10,
                    font: {
                        size: 14,
                        lineHeight: 2
                    },
                    }
                },
                },
            },
        });
    });
</script>