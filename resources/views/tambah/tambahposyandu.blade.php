<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Posyandu</title>

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
                        <h2 class="form-title">Tambah Posyandu</h2>
                        <form method="POST" action="/posyandu-form" class="register-form" id="register-form">
                            @csrf
                            <tr>
                                <td>Id Kelurahan</td>
                                <td>
                                    <select name="id_kelurahan">
                                        @foreach($kelurahan as $item)
                                    <option name="id_kelurahan" value="{{ $item->id }}">{{ $item->kelurahan }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <div class="form-group">
                                <input type="text" name="posyandu" id="name" placeholder="Nama Posyandu"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="alamat_posyandu" id="name" placeholder="Alamat Posyandu"/>
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
