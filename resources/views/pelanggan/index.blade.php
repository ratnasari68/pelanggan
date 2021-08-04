@extends('layouts.app', ['title' => 'Pelanggan'])

@section('content')
    <h1>Data Pelanggan</h1>

    <button type="button" class="btn btn-primary mb-3 tambah" >
        Tambah Pelanggan
    </button>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Pesanan</th>
                <th>Jumlah</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="target">

        </tbody>
    </table>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form-pelanggan">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Pelanggan</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="pesanan">Pesanan</label>
                            <input type="text" name="pesanan" id="pesanan" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary save" id="button">save</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
<script>
    $(document).ready(function() {

        function get() {
            var td = '';

            $.ajax({
                url: '/pelanggan',
                type: 'GET',
                success: function(result) {
                    $('#target').empty()
                    $.each(result.pelanggan, function(i, data) {
                        td += `
                        <tr>
                            <td>${i+1}</td>
                            <td>${data.nama}</td>
                            <td>${data.pesanan}</td>
                            <td>${data.jumlah}</td>
                            <td>${data.alamat}</td>
                            <td><a href="javascript:void(0)" class="btn btn-success edit" id="${data.id}">Edit</a><a href="javascript:void(0)" class="btn btn-danger delete" id="` + data.id + `">Delete</a></td>
                        </tr>`;
                    })

                    $('#target').append(td);
                }
            })
        }
        get()

        $(".tambah").on('click', function() {
            $(".modal-title").html('Tambah Pelanggan');
            $("#nama").val("");
            $("#pesanan").val("");
            $("#jumlah").val("");
            $("#alamat").val("");
            $('#exampleModal').modal('toggle');
        })

        console.log("oke")
        $(document).on("click",".save", function() {
            // Buat variable untuk menampung value dari inputan
            var nama = $("#nama").val();
            var pesanan = $("#pesanan").val();
            var jumlah = $("#jumlah").val();
            var alamat = $("#alamat").val();

            // Definisikan url & token
            let route = '{{ route("pelanggan.store") }}';
            let _token = $('input[name=_token]').val();

            $.ajax({
                url: route,
                method: 'POST',
                data: {
                    nama: nama,
                    pesanan: pesanan,
                    jumlah: jumlah,
                    alamat: alamat,
                    _token: _token
                },
                success: function({pelanggan}) {
                    $('#exampleModal').modal('toggle');
                    get()
                }
            });
        });

        $(".edit").on('click', function() {
            $('#exampleModal').modal('show');
            $(".modal-title").html('Edit pelanggan');

            var id = $(this).attr('id');
            let route = "/pelanggan/" + id + "/edit";

            $.ajax({
                url: route,
                method: 'GET',
                success: function(result) {
                    $("#id").val(result.pelanggan.id);
                    $("#nama").val(result.pelanggan.nama);
                    $("#pesanan").val(result.pelanggan.pesanan);
                    $("#jumlah").val(result.pelanggan.jumlah);
                    $("#alamat").val(result.pelanggan.alamat);
                }
            })
        })

        $(".delete").on('click', function() {
            confirm('Hapus data?')

            var id = $(this).attr('id');

            let route = `/pelanggan/${id}`;
            let _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: route,
                type: 'DELETE',
                data: {
                    _token: _token
                },
                success: function(result) {
                    $("tr.data").remove()
                    get()
                }
            })
        })
    });
</script>
@endsection
