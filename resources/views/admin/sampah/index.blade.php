@extends('layouts.template')
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Data Sampah</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#!">Data Sampah</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </div>
    @endif
    <div class="card">
        <div class="xtabledm">
            <a href="{{ route('sampah.create') }}" class="btn btn-primary mb-2"><i class="fa fa-plus"></i>Tambah</a>
            <table id="sampah" class="display" style="width:100%;font-size:14px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Sampah</th>
                        <th>Foto Sampah</th>
                        <th>Harga (Kg)</th>
                        <th>Status Sampah</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($item as $data)
                        @php
                            $i = $i + 1;
                        @endphp
                        <tr>
                            <td></td>
                            <td id="name" style="width:25%">{{ $data->nama_sampah }}</td>
                            <td style="width:10%"><img src="{{ asset('foto/sampah/' . $data->foto_sampah) }}"
                                    class="img-rounded" style="width:50%" alt=""></td>
                            <td>{{ $data->harga_sampah }}</td>
                            <td>
                                @if ($data->status_sampah == 'Aktif')
                                    <span class="badge bg-success">Aktif</span>
                                @elseif($data->status_sampah == 'Tidak Aktif')
                                    <span class="badge bg-danger">Tidak Aktif</span>
                                @endif
                            </td>
                            <td>

                                @if ($data->status_sampah == 'Aktif')
                                    <a href="#" class="btn btn-danger btn-sm"
                                        onclick="modalNonaktif({{ $data->id_sampah }})"><i class="bi bi-x"></i>
                                        Nonaktifkan</a>
                                @elseif($data->status_sampah == 'Tidak Aktif')
                                    <a href="#" class="btn btn-success btn-sm"
                                        onclick="modalAktif({{ $data->id_sampah }})"><i class="bi bi-check"></i>
                                        Aktifkan</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal --}}
    <div id="exampleModalCenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal Title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0" id="page"></p>
                </div>
                <div id="modalFooter" class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    {{-- endModal --}}
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var t = $('#sampah').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                stateSave: true,
                columnDefs: [{
                    searchable: false,
                    orderable: false,
                    targets: 0,
                }, ],
                order: [
                    [1, 'asc']
                ],

            });

            t.on('order.dt search.dt', function() {
                let i = 1;

                t.cells(null, 0, {
                    search: 'applied',
                    order: 'applied'
                }).every(function(cell) {
                    this.data(i++);
                });
            }).draw();



        });

        function modalNonaktif(id_sampah) {

            $("#exampleModalCenterTitle").html(`Nonaktifkan sampah`)
            $("#page").html(`Apakah Anda Yakin Untuk Menonaktifkan Sampah?`);
            $("#modalFooter").html(`
            <a style="color:white" class="btn  btn-secondary" data-dismiss="modal">Tutup</a>
            <a href="#" class="btn btn-danger" onclick="ubahStatus_Sampah(` + id_sampah + `)" id="status` + id_sampah +
                `" data-custom-value="Tidak Aktif"><i class="bi bi-x"></i> Nonaktifkan</a>`)
            $("#exampleModalCenter").modal('show');
        }

        function modalAktif(id_sampah) {

            $("#exampleModalCenterTitle").html(`Aktifkan sampah`)
            $("#page").html(`Apakah Anda Yakin Untuk Aktifkan sampah?`);
            $("#modalFooter").html(` 
            <a style="color:white" class="btn  btn-secondary" data-dismiss="modal">Tutup</a>
            <a href="#"  class="btn btn-success" onclick="ubahStatus_Sampah(` + id_sampah + `)" id="status` +
                id_sampah +
                `" data-custom-value="Aktif"><i class="bi bi-check"></i> Aktifkan</a>`)
            $("#exampleModalCenter").modal('show');
        }


        function ubahStatus_Sampah(id_sampah) {
            var status = $("#status" + id_sampah).data("custom-value");
            $.ajax({
                type: "get",
                url: "{{ url('ubahstatussampah') }}/" + id_sampah,
                data: {
                    'status': status,
                },
                success: function(data) {
                    location.reload();
                }
            });
        }
    </script>
@endsection
