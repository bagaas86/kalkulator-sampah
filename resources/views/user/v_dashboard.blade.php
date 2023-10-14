@extends('layouts.templateBaru')
@section('navigasi')
@endsection
@section('content')
    <div class="row">
        <div class="col col-12 col-md-12">
            <div class="container text-center mb-4" data-aos="fade-up">
                <h4>Selamat Datang, {{ Auth::user()->name }}</h4>
            </div>
        </div>
    </div>

    <div>
        <div class="card">
            <div class="xtabledm">
                @php
                    date_default_timezone_set('Asia/Jakarta');
                    $d = date('Y-m');
                    $finaldate = date('Y-m', strtotime($d . '+1 month'));
                @endphp
                <div class="row mt-4">
                    <div class="form-group col-md-4">
                        {{-- <label for="">Periode</label>
                        <a href="#" onclick="downloadbar2()" id="downloadButton">Download</a> --}}
                        <div class="input-group">
                            <input type="month" id="bulan" class="form-control" value="{{ $d }}"
                                onchange="jh()">
                            <div style="width:20%">
                                <input style="text-align:center" type="text" class="form-control" value="-"
                                    readonly>
                            </div>
                            <input type="month" id="bulan2" class="form-control" value="{{ $finaldate }}"
                                onchange="jh()">
                        </div>
                        <div class="input-group">
                            <input type="date" id="dari" class="form-control" onchange="bar2()">
                            <div style="width:20%">
                                <input style="text-align:center" type="text" class="form-control" value="-"
                                    readonly>
                            </div>
                            <input type="date" id="sampai" class="form-control" onchange="bar2()">
                        </div>
                    </div>

                </div>

                <div id="barsampah">
                </div>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
    <script>
        $(document).ready(function() {
            jh()

        });

        function jh() {
            var bulan = $("#bulan").val();
            var bulan2 = $("#bulan2").val();
            $.ajax({
                type: "get",
                url: "{{ url('hari') }}",
                data: {
                    "bulan": bulan,
                    "bulan2": bulan2,
                },
                success: function(data) {
                    $("#dari").val(bulan + "-01");
                    $("#sampai").val(bulan2 + "-" + data);
                    bar2()
                }
            });

        };

        function bar2() {
            $("#barsampah").html(`<canvas id="barChart" style="max-height: 400px;"></canvas>`);
            var dari = $("#dari").val();
            var sampai = $("#sampai").val();
            $.ajax({
                type: "get",
                url: "{{ url('profil/chartsampah') }}",
                data: {
                    "dari": dari,
                    "sampai": sampai,
                },
                success: function(data) {
                    var h = data.h;
                    var v = data.v;
                    var barc = document.getElementById("barChart").getContext('2d');
                    new Chart(barc, {
                        type: 'bar',
                        data: {
                            labels: h,
                            datasets: [{
                                label: 'Jumlah Sampah (Kg)',
                                data: v,
                                backgroundColor: [
                                    'rgba(255, 99, 0)',

                                ],
                                borderColor: [
                                    'rgb(255, 99, 132)',

                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    min: 0,
                                    max: 100
                                }
                            },
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Grafik',
                                    font: {
                                        size: 24
                                    }
                                }
                            }
                        }
                    });


                }
            })
        };
    </script>
@endsection
