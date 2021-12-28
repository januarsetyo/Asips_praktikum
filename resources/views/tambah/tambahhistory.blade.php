<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah History</title>

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
                        <h2 class="form-title">Tambah History</h2>
                        <form method="POST" action="/history-form" class="register-form" id="register-form">
                            @csrf
                            <tr>
                                <td>Nama Balita</td>
                                <td>
                                    <select name="id_balita">
                                        <option>Pilih Balita</option>
                                        @foreach($balita as $item)
                                    <option name="id_balita" value="{{ $item->id }}">{{ $item->nama_balita }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <div class="form-group">
                                <input type="date" name="tgl_posyandu" id="name" placeholder="Tanggal Posyandu"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="berat_badan_balita" id="name" placeholder="Berat Badan Balita"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="tinggi_badan" id="name" placeholder="Tinggi Badan Balita"/>
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


