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
                        <h2 class="form-title">Edit User</h2>
                        <form method="post" action="/update-user" class="register-form" id="register-form">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <input type="hidden" placeholder="ID" name="id" value="{{ $user->id }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user text-center" id="username"
                                    placeholder="Username" name="username" value="{{ $user->username }}">
                            </div>
                            <div class="form-group">
                                <select name="id_role" class="form-control text-center">
                                    @foreach ($role as $item)
                                        <option value="{{ $item->id }}">{{ $item->role }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <a href="/user"><button type="button" class="btn btn-danger">Hapus</button>
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
