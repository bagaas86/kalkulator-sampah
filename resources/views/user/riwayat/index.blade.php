@extends('layouts.templateBaru')
@section('content')
    <div class="container">
        <div class="row">
            <div id="history" class="col col-12 col-md-12">
                <div class="text-center title">
                    <h3><b>RIWAYAT</b></h3>
                </div>
                <div class="col col-12 col-md-6 mx-auto">
                    @foreach ($transaksi as $data)
                        <div class="card">
                            <div class="row">
                                <div class="card-body col col-8 col-md-8">
                                    <table>
                                        <tr>
                                            <td>Jenis Sampah</td>
                                            <td>:</td>
                                            <td> {{ $data->nama_sampah }}</td>
                                        </tr>
                                        <tr>
                                            <td>Harga Satuan (Kilogram)</td>
                                            <td>:</td>
                                            <td> {{ $data->harga_satuan }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Sampah (Kilogram)</td>
                                            <td>:</td>
                                            <td> {{ $data->jumlah_sampah }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Harga</td>
                                            <td>:</td>
                                            <td id="total{{ $data->id_transaksi }}"></td>
                                        </tr>
                                    </table>
                                    <div class="row">
                                        <div class="col col-12 col-md-12" style="text-align: right">
                                            <small style="font-size:10px;text-align: right">{{ $data->tanggal }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {
                                start('{{ $data->id_transaksi }}', {{ $data->total }});
                            });

                            function start(id, harga_total) {
                                var formatted_harga_total = parseFloat(harga_total).toLocaleString('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR'
                                });

                                $("#total" + id).html(formatted_harga_total);
                            }
                        </script>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
