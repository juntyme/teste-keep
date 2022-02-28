@extends('layout.master')

@section('content')
    {{-- Conteudo --}}
    <section class="features-icons bg-light text-left">
        <div class="container">
            <h4>Cadastrar Dicas</h4>
            <hr class="my-4">
            <form action="{{ route('admin.salvarDicas') }}" name="novaDica" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-sm-6 mt-3 mb-3">
                        <label for="exampleFormControlSelect1">Tipo de Veículo:</label>
                        <select class="form-control @error('tipo_veiculo') is-invalid @enderror" name="tipo_veiculo"
                            required>
                            <option value="">-- Selecione --</option>
                            @foreach ($tipo_veiculo as $item)
                                <option value="{{ $item->id }}" @if (old('tipo_veiculo') && $item->id == old('tipo_veiculo')) selected @endif>
                                    {{ $item->tipo_veiculo }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-6 mt-3 mb-3">
                        <label for="marca">Marca:</label>
                        <input type="text" class="form-control @error('marca') is-invalid @enderror" name="marca"
                            aria-describedby="marca" placeholder="Marca" value="{{ old('marca') }}" required>
                    </div>
                    <div class="form-group col-sm-6 mt-3 mb-3">
                        <label for="modelo">Modelo:</label>
                        <input type="text" class="form-control @error('modelo') is-invalid @enderror" name="modelo"
                            aria-describedby="modelo" placeholder="Modelo" value="{{ old('modelo') }}" required>
                    </div>
                    <div class="form-group col-sm-6 mt-3 mb-3">
                        <label for="versao">Versão:</label>
                        <input type="text" class="form-control @error('versao') is-invalid @enderror" name="versao"
                            aria-describedby="versao" value="{{ old('versao') }}" placeholder="versao">
                    </div>
                    <div class="form-group mt-3 mb-3">
                        <label for="dicas">Dicas</label>
                        <textarea id="editor" class="@error('dicas') is-invalid @enderror"
                            name="dicas">{{ old('dicas') }}</textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.home') }}" class="btn btn-primary">Voltar</a>
                        <button class="btn btn-success">Salvar Dica</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </section>
@endsection
