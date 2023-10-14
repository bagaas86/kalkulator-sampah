<div>
    <center>
        <h6>Sampah {{ $item->nama_sampah }}</h6>
        <img class="img-thumbnail" src="{{ asset('foto/sampah/' . $item->foto_sampah) }}" width="20%" height="20%"
            alt="">
    </center>

    <div class="deskripsi">
        <table style="width:50%">
            <tr>
                <td>Nama Sampah</td>
                <td>:</td>
                <td>{{ $item->nama_sampah }}</td>
            </tr>
            <tr>
                <td>Harga Sampah</td>
                <td>:</td>
                <td>{{ $item->harga_sampah }}/Kilogram</td>
            </tr>
            <tr>
                <td>Deskripsi Sampah</td>
                <td>:</td>
                <td>{{ $item->deskripsi_sampah }}</td>
            </tr>

        </table>
    </div>

    <div class="col col-12 col-md-12 mt-4">
        <center>
            <h6>HITUNG SEKARANG</h6>
        </center>
    </div>

    <input type="text" value="{{ $item->harga_sampah }}" id="harga_satuan" hidden>
    <input type="text" value="{{ $item->id_sampah }}" id="id_sampah" hidden>
    <input type="text" id="total_hidden" hidden>
    <div class="form mt-4">
        <div class="row">
            <div class="col col-md-4 col-12">
                <label for="">Jumlah Sampah (kg)</label>
                <input type="text" id="jumlah_sampah" class="form-control">
                <div class="peringatan">
                    <span id="error" style="color: red;display:none;">Jumlah harus lebih dari 0</span>
                </div>
            </div>
            <div class="col col-md-2 col-2">
                <button onclick="hitung()" class="btn btn-primary mt-4">Hitung</button>
            </div>
            <div class="col col-md-6 col-12">
                <label for="">Harga Total</label>
                <input type="text" id="harga_total" class="form-control" value="" readonly>
            </div>
        </div>

        <center>
            <div class="col col-md-12 col-12 mt-4">
                <button style="display:none" onclick="resetPerhitungan({{ $item->id_sampah }})" id="resetButton"
                    class="btn btn-warning">Reset</button>
            </div>
            <div class="col col-md-12 col-12 mt-4">
                <button style="display: none" onclick="simpanPerhitungan({{ $item->id_sampah }})" id="simpanButton"
                    class="btn btn-primary">Simpan
                    Perhitungan</button>
            </div>
        </center>
    </div>
</div>

<script>
    function hitung() {
        var harga_satuan = $("#harga_satuan").val();
        var jumlah_sampah = $("#jumlah_sampah").val();
        var jumlah_sampah_parsed = parseFloat(jumlah_sampah.replace(',', '.'));

        if (isNaN(jumlah_sampah_parsed) || jumlah_sampah_parsed < 0) {
            document.getElementById('error').style.display = "block";
        } else {
            document.getElementById('error').style.display = "none";
            var harga_total = harga_satuan * jumlah_sampah_parsed;
            $("#total_hidden").val(harga_total);
            var formatted_harga_total = harga_total.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });

            $("#harga_total").val(formatted_harga_total);

            var inputElement = document.getElementById('jumlah_sampah');
            inputElement.readOnly = true;
            var resetButton = document.getElementById('resetButton').style.display = "block";
            var simpanButton = document.getElementById('simpanButton').style.display = "block";
        }

    }

    function simpanPerhitungan(id_sampah) {
        var harga_satuan = $("#harga_satuan").val();
        var harga_total = $("#total_hidden").val();
        var jumlah_sampah = $("#jumlah_sampah").val();
        $.ajax({
            type: "get",
            url: "{{ url('simpan') }}",
            data: {
                "harga_satuan": harga_satuan,
                "harga_total": harga_total,
                "id_sampah": id_sampah,
                "jumlah_sampah": jumlah_sampah,
            },
            success: function(data, status) {
                $('#exampleModalCenter2').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Perhitungan Disimpan!'
                })
            }
        });

    }

    function resetPerhitungan(id_sampah) {
        $("#jumlah_sampah").val(0);
        $("#harga_total").val(0);
        var inputElement = document.getElementById('jumlah_sampah');
        inputElement.readOnly = false;

        var resetButton = document.getElementById('resetButton').style.display = "none";
        var simpanButton = document.getElementById('simpanButton').style.display = "none";


    }
</script>
