<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah User Role</title>

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
                        <h2 class="form-title">Tambah User Role</h2>
                        <form method="POST" action="/userrole-form" class="register-form" id="register-form">
                            @csrf
                            <tr>
                                <td>Nama User</td>
                                <td>
                                    <select name="id_user">
                                        <option>Pilih User</option>
                                        @foreach($user as $item)
                                    <option name="id_user" value="{{ $item->id }}">{{ $item->username }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td>
                                    <select name="id_role">
                                        <option>Pilih Role</option>
                                        @foreach($role as $item)
                                    <option name="id_role" value="{{ $item->id }}">{{ $item->role }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>

                            <div class="form-group form-button">
                                <button type="submit" class="form-submit">Tambah</button>
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
