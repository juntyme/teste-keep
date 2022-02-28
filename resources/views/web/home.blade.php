@extends('layout.master')

@section('content')
    {{-- Masthead --}}
    <header class="masthead">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center text-white">
                        <h1 class="mb-5">Vejas as dicas sobre veículos!</h1>
                        <form action="{{ route('home.search') }}" class="form-subscribe" id="contactForm" method="get">
                            <div class="row">
                                <div class="input-group">
                                    <select class="col-12 col-sm-4 form-control-lg" id="tipo" name="tipo">
                                        @foreach ($tipo_veiculo as $item)
                                            <option value="{{ $item->id }}">{{ $item->tipo_veiculo }}</option>
                                        @endforeach
                                    </select>
                                    <input class="col-auto form-control form-control-lg" id="search" type="text"
                                        placeholder="Busca por veículos" data-sb-validations="required" value="" />
                                    <div class="col-auto">
                                        <button class="btn btn-primary btn-lg " id="submitButton"
                                            type="submit">Localizar</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    {{-- Icons Grid --}}
    <section class="features-icons bg-light text-left">
        <div class="container">
            <h1>Últimas Discas:</h1>
            <div class="row">
                @if (!empty($dicas))
                    @foreach ($dicas as $item)
                        <div class="col-sm-6 col-lg-3  ">
                            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3 border m-2 p-2">
                                <a href="{{ route('home.detalhes', ['id' => $item->id]) }}"
                                    class="text-black text-decoration-none">
                                    <h4>{{ $item->tipo_veiculo }}: {{ $item->marca }} {{ $item->modelo }}
                                        {{ $item->versao ?? '' }} </h4>
                                </a>

                                <p class="lead mb-0">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($item->dicas), 150, $end = '...') }}</p>
                                <a href="{{ route('home.detalhes', ['id' => $item->id]) }}"
                                    class="btn btn-sm btn-outline-dark m-3">Visualizar</a>

                                <h6>{{ $item->name }} |
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}

                                </h6>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <h2>Sem Dicas Cadastradas...</h2>
                    </div>
                @endif

            </div>
        </div>
    </section>
@endsection
