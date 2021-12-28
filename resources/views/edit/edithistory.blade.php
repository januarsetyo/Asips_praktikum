<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit History</title>

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
                        <h2 class="form-title">Edit History</h2>
                        <form method="POST" action="/update-history" class="register-form" id="register-form">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <input type="hidden" class="form-control form-control-user text-center" id="idPosIn"
                                    placeholder="ID History" name="id" value="{{ $history_posyandu->id }}">
                            </div>
                            <div class="form-group">
                                <select name="Nama Balita" class="form-control text-center">
                                    @foreach ($balita as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_balita }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control form-control-user text-center" id="tgl_posyandu"
                                    placeholder="Tanggal" name="tgl_posyandu" value="{{ $history_posyandu->tgl_posyandu }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user text-center" id="berat_badan_balita"
                                    placeholder="Berat Badan Balita" name="berat_badan_balita" value="{{ $history_posyandu->berat_badan_balita }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user text-center" id="tinggi_badan"
                                    placeholder="Tinggi Badan" name="tinggi_badan" value="{{ $history_posyandu->tinggi_badan }}">
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