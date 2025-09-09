@extends('template/layout')

@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengguna</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item label-judul active">Ubah Password</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="col-lg-12">

                    <form action="{{ url('pengguna/simpanubahpassword') }}" method="POST" id="form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title font-weight-bold"><i class="fab fa-wpforms mr-1"></i><span
                                            class="label-judul"></span> Data Pengguna</h4>
                                    <span class="float-right font-weight-bold" id="lblidpengguna"></span>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12 text-center">
                                                        <img src="{{ url('images/profil1.png') }}" alt=""
                                                                    class="" style="width: 50%;" id="imgProfil">
                                                    </div>

                                                    <div class="col-12 mt-3">
                                                        <div class="form-group row">
                                                            <div class="col-md-12 text-center">
                                                                
                                                                <input type="file" name="fotopengguna" id="fotopengguna"
                                                                class="btn btn-sm">
                                                                <input type="hidden" name="fotopengguna_lama" id="fotopengguna_lama"
                                                                class="btn btn-sm">
                                                            </div>
                                                            <label for="fotopengguna" class="col-md-12 text-center"><small
                                                                    class="text-danger"> (Maksimal 200Kb)</small></label>
                                                            <div class="col-md-12">
                                                                <label for="" id="lblNamaFile"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-rapat">
                                                                <tbody id="tbodyInfoPengguna">
                                                                    
                                                                </tbody>

                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-body">
                                                <input type="hidden" name="idpengguna" id="idpengguna">

                                                <div class="form-group row">
                                                    <label for="passwordlama" class="col-md-4 col-form-label">Password Lama</label>
                                                    <div class="col-md-8">
                                                        <input type="password" name="passwordlama" id="passwordlama" class="form-control"
                                                            placeholder="**********">                                            
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="password" class="col-md-4 col-form-label">Password Baru</label>
                                                    <div class="col-md-8">
                                                        <input type="password" name="password" id="password" class="form-control"
                                                            placeholder="**********">                                            
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="password" class="col-md-4 col-form-label">Ulangi Password Baru</label>
                                                    <div class="col-md-8">
                                                        <input type="password" name="password2" id="password2" class="form-control"
                                                            placeholder="**********">
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>


                                

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right" id="btnSimpan"><i
                                        class="fa fa-save mr-1"></i>Simpan</button>
                                <a href="{{ url('pengguna') }}" class="btn btn-default float-right mr-1"><i
                                        class="fa fa-chevron-left mr-1"></i>Kembali</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('scripts')
<script>
    var idpengguna = "{{ $idpengguna }}";

    $(document).ready(function() {

        $('#idpengguna').val(idpengguna);
        $('.label-judul').html('Ubah Password');

        $.ajax({
                url: "{{ url('pengguna/getDataID') }}",
                type: 'GET',
                dataType: 'json',
                data: {
                    'idpengguna': idpengguna
                },
            })
            .done(function(response) {
                console.log(response);
                $('#lblidpengguna').html("ID: " + idpengguna);

                var addText = `
                    <tr>
                        <td width="25%">Nama</td>
                        <td width="5%" style="text-align: center;">:</td>
                        <td width="70%">` + response['namapengguna'] + `</td>
                    </tr>
                    <tr>
                        <td width="25%">JK</td>
                        <td width="5%" style="text-align: center;">:</td>
                        <td width="70%">` + response['jeniskelamin']  + `</td>
                    </tr>
                    <tr>
                        <td width="25%">No HP</td>
                        <td width="5%" style="text-align: center;">:</td>
                        <td width="70%">` + response['notelppengguna'] + `</td>
                    </tr>
                    <tr>
                        <td width="25%">Email</td>
                        <td width="5%" style="text-align: center;">:</td>
                        <td width="70%">` + response['emailpengguna'] + `</td>
                    </tr>
                    <tr>
                        <td width="25%">Username</td>
                        <td width="5%" style="text-align: center;">:</td>
                        <td width="70%">` + response['username'] + `</td>
                    </tr>
                `;

                $('#tbodyInfoPengguna').html(addText);
                
                $('#fotopengguna_lama').val(response['fotopengguna']);
                console.log("src", "{{ url('uploads/pengguna') }}" + "/" + response['fotopengguna']);
                $('#imgProfil').attr("src", "{{ url('uploads/pengguna') }}" + "/" + response['fotopengguna']);
            })
            .fail(function() {
                console.log('error getDataID');
            });
            
        $('#form').bootstrapValidator({
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    passwordlama: {
                        validators: {
                            notEmpty: {
                                message: 'Password lama tidak boleh kosong'
                            },
                            stringLength: {
                                min: 5,
                                max: 25,
                                message: 'minimal 5 sampai dengan 25 karakter'
                            },
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Password baru tidak boleh kosong'
                            },
                            stringLength: {
                                min: 5,
                                max: 25,
                                message: 'minimal 5 sampai dengan 25 karakter'
                            },
                        }
                    },
                    password2: {
                        validators: {
                            notEmpty: {
                                message: 'Ulangi password tidak boleh kosong'
                            },
                            stringLength: {
                                min: 5,
                                max: 25,
                                message: 'minimal 5 sampai dengan 25 karakter'
                            },
                        }
                    },
                }
            })
            .on('success.form.bv', function(e) {
                $('#btnSimpan').attr("disabled", true);
            });



    });
</script>
@endsection