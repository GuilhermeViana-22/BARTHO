@extends('adminpanel', ['admincss' => true])

@section('content')

    <div class="page-header">
        <h4>Gerenciar alternativas da pergunta #{{$pergunta->id}}</h4>

        @permissao('configuracoes.perguntas.gerenciar')
        <button type="button" class="btn btn-success btn-new" onclick="showModal('{{route('arearestrita.configuracoes.adocoesperguntas.incluiralternativamodal', ['id' => $pergunta->id])}}', 'Incluir alternativa')">
            Incluir
        </button>
        @endpermissao
    </div>

    <div class="form-panel">
        <div class="form-body row">
            <div class="col col-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="nome" class="form-label">Pergunta</label>
                <input type="text" class="form-control" id="pergunta" name="pergunta" value="{{$pergunta->pergunta}}" disabled placeholder="Pergunta que será realizada">
            </div>

            <div class="col col-12 col-lg-12 col-md-12 col-sm-12 mb-3">

                <div class="mt-2">
                    <p>Alternativas </p>
                </div>

                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Alternativa</th>
                        <th scope="col">Opções</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($alternativas as $alternativa)
                        <tr>
                            <td scope="row"> {{$alternativa->id}} </td>
                            <td scope="row"> {{$alternativa->selecao}} </td>
                            <td>
                                @permissao('configuracoes.perguntas.gerenciar')
                                <button type="button" class="btn btn-danger btn-trash" onclick="irPara('{{route('arearestrita.configuracoes.adocoesperguntas.excluiralternativa', ['id' => $alternativa->id])}}')">
                                    Excluir
                                </button>
                                @endpermissao
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
