<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Posyandu</title>

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
                        <h2 class="form-title">Edit Posyandu</h2>
                        <form method="post" action="/update-posyandu" class="register-form" id="register-form">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <input type="hidden" placeholder="ID Posyandu" name="id" value="{{ $posyandu->id }}">
                            </div>
                            <div class="form-group">
                                <tr>
                                    <td>Id Kelurahan</td>
                                    <td>
                                <select name="id_kelurahan" class="form-control text-center">
                                    @foreach ($kelurahan as $item)
                                        <option value="{{ $item->id }}">{{ $item->kelurahan }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user text-center" id="posyanduIn"
                                    placeholder="Nama Posyandu" name="posyandu" value="{{ $posyandu->nama_posyandu }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user text-center" id="alamat"
                                    placeholder="Alamat Posyandu" name="alamat_posyandu" value="{{ $posyandu->alamat_posyandu }}">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <a href="/posyandu"><button type="button" class="btn btn-danger">Hapus</button>
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
