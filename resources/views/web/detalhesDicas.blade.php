@extends('layout.master')

@section('content')
    {{-- Icons Grid --}}
    <section class="features-icons bg-light text-left">
        <div class="container">
            <div class="d-flex justify-content-left">
                <a href="{{ route('home.search') }}" class="btn btn-sm btn-outline-dark m-3">
                    << Voltar</a>
                        <h1 class="mt-2">{{ $dicas->tipo_veiculo }}: {{ $dicas->marca }} {{ $dicas->modelo }}
                            {{ $dicas->versao ?? '' }}</h1>
            </div>

            <hr class="my-4">
            <p>
                {!! $dicas->dicas !!}
            </p>
            <hr class="my-4">
            <div class="d-flex justify-content-between">
                <div>Autor: {{ $dicas->name }} </div>
                <div>Data: {{ \Carbon\Carbon::parse($dicas->created_at)->format('d/m/Y') }}</div>
            </div>
        </div>
    </section>
@endsection
