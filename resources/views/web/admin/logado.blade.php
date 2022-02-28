@extends('layout.master')

@section('content')
    {{-- Conteudo --}}

    {{-- Icons Grid --}}
    <section class="features-icons bg-light text-left">
        <div class="container">
            <h4>Olá, {{ Auth::user()->name }}, veja suas dicas cadastradas</h4>
            <hr class="my-4">
            @empty(!Session('alert'))
                <div class="alert alert-success" role="alert">
                    <p>{{ Session('alert') }}</p>
                </div>
            @endempty
            <div class="row">
                @if (!empty($dicas) && count($dicas) > 0)
                    @foreach ($dicas as $item)
                        <div class=" col-sm-6 col-lg-3 ">
                            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3 border m-2 p-2">
                                <h4>{{ $item->tipo_veiculo }}: {{ $item->marca }} {{ $item->modelo }}
                                    {{ $item->versao ?? '' }} </h4>
                                <p class="lead mb-0">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($item->dicas), 150, $end = '...') }}</p>
                                <br>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.editarDicas', ['id' => $item->id]) }}"
                                        class="btn btn-outline-primary btn-sm">Editar</a>

                                    <a href="{{ route('admin.delete', ['id' => $item->id]) }}"
                                        class="btn btn-outline-danger btn-sm">Excluir</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 mt-5 mb-5">
                        <h2>Sem Dicas Cadastradas...</h2>
                    </div>
                @endif

            </div>
        </div>
    </section>

@endsection
