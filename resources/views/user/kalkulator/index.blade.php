@extends('layouts.templateBaru')
@section('navigasi')
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!">Kalkulator Sampah</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col col-12 col-md-12">
            <div class="container text-center" data-aos="fade-up">
                <h4>Data Sampah Tersedia</h4>
            </div>
            <div>

                <div class="row mt-2">
                    <div class="col col-md-12 col-12">
                        <div class="tableItem" id="tableItem">
                            <div class="row">
                                @foreach ($item as $data)
                                    <div class="col col-6 col-md-3" style="margin-top:1em;">
                                        <div class="card h-100" style="border:1px solid grey">
                                            <div type="button" onclick="tambahitem({{ $data->id_sampah }})"
                                                class="card-header h-50">
                                                <div style="text-align: center">
                                                    <img class="img-thumbnail"
                                                        src="{{ asset('foto/sampah/' . $data->foto_sampah) }}"
                                                        width="50%" height="50%" alt="">
                                                </div>


                                            </div>
                                            <div class="card-body h-20">
                                                <div style="text-align: center">
                                                    <h6>{{ $data->nama_sampah }}</h6>
                                                    <h6>{{ $data->harga_sampah }}/Kg</h6>
                                                    <button class="btn btn-primary"
                                                        onclick="modalKalkulator({{ $data->id_sampah }})">Hitung
                                                        Sekarang!</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- Modal --}}
    <div id="exampleModalCenter2" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle2">Modal Title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0" id="page2"></p>
                </div>
                <div id="modalFooter2" class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    {{-- endModal --}}
@endsection

<script>
    function modalKalkulator(id_sampah) {
        $.get("{{ url('modal') }}/" + id_sampah, {}, function(data, status) {
            $("#exampleModalCenterTitle2").html(`Hitung Jumlah Sampah`)
            $("#page2").html(data);
            $("#modalFooter2").html(`
            <a style="color:white" class="btn  btn-secondary" data-dismiss="modal">Tutup</a>)`)
            $("#exampleModalCenter2").modal('show');
        })

    }
</script>
