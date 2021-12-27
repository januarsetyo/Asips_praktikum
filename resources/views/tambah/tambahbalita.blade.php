<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Balita</title>

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
                        <h2 class="form-title">Tambah Balita</h2>
                        <form method="POST" action="/balita-form" class="register-form" id="register-form">
                            @csrf
                            <tr>
                                <td>Id Posyandu</td>
                                <td>
                                    <select name="id_posyandu">
                                        @foreach($posyandu as $item)
                                    <option name="id_posyandu" value="{{ $item->id }}">{{ $item->posyandu }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <div class="form-group">
                                <input type="text" name="nama_balita" id="name" placeholder="Nama Balita"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nik_orang_tua" id="name" placeholder="NIK Orang Tua"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nama_orang_tua" id="name" placeholder="Nama Orang Tua"/>
                            </div>
                            <div class="form-group">
                                <input type="date" name="tgl_lahir_balita" id="name" placeholder="Tanggal Lahir Balita"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="jenis_kelamin_balita" id="name" placeholder="Jenis Kelamin Balita"/>
                            </div>
                            <div class="form-group form-button">
                                <button type="submit" name="signup" id="signup" class="form-submit">Tambah</button>
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


