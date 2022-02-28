<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Sistema Teste de Processo Seletivo" />
    <meta name="author" content="Jonas Ferreira" />
    <title>Teste Sistema - Keep</title>
    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    {{-- Bootstrap icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"
        type="text/css" />
    {{-- Google fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
        type="text/css" />
    {{-- Core theme CSS (includes Bootstrap) --}}
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#editor',
            menubar: false
        });
    </script>

</head>

<body>
    {{-- Navigation --}}
    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand text-capitalize font-weight-bold" href="{{ route('home.index') }}">Sistema Teste</a>
            <div class="row">
                @if (Auth::user())
                    <div class="col-8">
                        @if (Route::is('admin.adicionarDicas') || Route::is('admin.home'))
                            <a class="btn btn-success" href="{{ route('admin.novaDicas') }}">Cadastrar Dicas</a>
                        @else
                            <a class="btn btn-success" href="{{ route('admin.home') }}">Acessar Admin</a>
                        @endif

                    </div>
                    <div class="col-4">
                        <a class="btn btn-danger" href="{{ route('home.logout') }}">Sair</a>
                    </div>
                @else
                    <div class="col-6">
                        <a class="btn btn-success" href="{{ route('home.cadastro') }}">Cadastro</a>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-primary" href="{{ route('home.login') }}">Login</a>
                    </div>
                @endif
            </div>
        </div>
    </nav>

    {{-- Conteudo --}}
    @yield('content')
    {{-- Footer --}}
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a href="{{ route('home.index') }}"
                                class="text-decoration-none">Home</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="{{ route('home.login') }}"
                                class="text-decoration-none">Login</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="{{ route('home.cadastro') }}"
                                class="text-decoration-none">Cadastro</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="{{ route('admin.home') }}"
                                class="text-decoration-none">Área Administrativa</a></li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">&copy; Sistema Teste <?= date('Y') ?>. Desenvolvido para
                        Processo
                        Seletivo Keep.</p>
                </div>
                {{-- <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-facebook fs-3"></i></a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-twitter fs-3"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!"><i class="bi-instagram fs-3"></i></a>
                        </li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </footer>
    {{-- Bootstrap core JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    @if (Route::is('home.search'))
        @include('web.js.home')
    @endif

    <script>
        $('div.alert').delay(3000).fadeOut(350);
    </script>

</body>

</html>
