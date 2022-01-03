<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Balita</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="regis/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="regis/css/style.css">
    <link rel="icon" href="./assets/images/logo.png">

</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Edit Balita</h2>
                        <form method="POST" action="/update-balita" class="register-form" id="register-form">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <input type="hidden"placeholder="ID Balita" name="id" value="{{ $balita->id }}">
                            </div>
                            <div class="form-group">
                                <tr>
                                    <td>Id Posyandu</td>
                                    <td>
                                <select name="id_posyandu" class="form-control text-center">
                                    @foreach ($posyandu as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_posyandu }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user text-center" id="nama"
                                    placeholder="Nama Balita" name="nama" value="{{ $balita->nama_balita }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user text-center" id="nik"
                                    placeholder="Nik orang tua" name="nik" value="{{ $balita->nik_orang_tua }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user text-center" id="nama orang tua"
                                    placeholder="Nama orang tua" name="nama orang tua" value="{{ $balita->nama_orang_tua }}">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control form-control-user text-center" id="tanggal"
                                    placeholder="tgl lahir balita" name="tanggal" value="{{ $balita->tgl_lahir_balita }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user text-center" id="jk"
                                    placeholder="jenis kelamin balita" name="jk" value="{{ $balita->jenis_kelamin_balita }}">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <a href="/balita"><button type="button" class="btn btn-danger">Hapus</button>
                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <button type="submit" name="submit" class="btn btn-success btn-user btn-block">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- JS -->
    <script src="regis/vendor/jquery/jquery.min.js"></script>
    <script src="regis/js/main.js"></script>
</body>
</html>
