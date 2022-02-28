@extends('layout.master')

@section('content')
    {{-- Conteudo --}}
    <style>
        .top_login {
            margin-top: 100px;
            margin-bottom: 100px;
        }

        button {
            margin-top: 20px;
        }

        .centered {
            margin: 0 auto;
            float: none;
        }

    </style>

    <div class="container justify-content-center top_login">
        <div class="row">
            <div class="col-md-4 centered">
                <form name="cadastro" action="{{ route('home.cadastro.novo') }}" class="form-signin" method="post">
                    @csrf
                    <div class="text-center mb-4">
                        <h1 class="h3 mb-3 font-weight-normal">Cadastro Usuário</h1>

                    </div>
                    @empty(!Session::get('error'))
                        <div class="alert alert-danger" role="alert">
                            <p>{{ Session::get('error') }}</p>
                        </div>
                    @endempty
                    <div class="form-label-group mt-3 mb-3">
                        <label for="inputEmail">Nome:</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Informe seu nome"
                            required="" autofocus="">

                    </div>
                    <div class="form-label-group mt-3 mb-3">
                        <label for="inputEmail">E-mail:</label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Informe o e-mail correto" required="" autofocus="">

                    </div>

                    <div class="form-label-group">
                        <label for="inputPassword">Senha</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Senha"
                            required="">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-lg btn-primary btn-block " type="submit">Cadastrar</button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('home.login') }}" class="text-decoration-none ">Fazer
                            Login.</a>
                    </div>

                </form>
            </div>

        </div>

    </div>
@endsection
