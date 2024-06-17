<div class="form-panel">
    <div class="form-header">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            @php $i = 0; @endphp
            @foreach( \App\Models\AreaRestrita\Modulo::all() as $modulo )
                @php $i++ @endphp
                <li class="nav-item">
                    <a class="nav-link @if($i == 1) active @endif" id="nav-{{$modulo->id}}-tab" data-toggle="tab" href="#modulo-{{$modulo->id}}" role="tab" aria-controls="{{$modulo->id}}" aria-selected="true">{{$modulo->nome}}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="form-body row">
        <form action="{{ route('arearestrita.usuarios.salvarpermissoes') }}" method="POST" enctype="multipart/form-data" class="row" id="salvar_permissoes_form">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <i class="fa fa-times" aria-hidden="true"></i> {{$error}}
                    </div>
                @endforeach
            @endif

            @csrf

            <input type="hidden" name="usuario_id" value="{{$usuario->id}}">

            <div class="tab-content" id="myTabContent">
                @php $i = 0; @endphp
                @foreach( \App\Models\AreaRestrita\Modulo::all() as $modulo )
                    @php $i++ @endphp

                    <div class="tab-pane fade @if($i == 1) show active @endif" id="modulo-{{$modulo->id}}" role="tabpanel" aria-labelledby="{{$modulo->id}}-tab">

                        @foreach($modulo->permissoes as $permissao )
                            <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" @if( in_array($permissao->path, $usuario->permissoes_lista) ) checked @endif type="checkbox" role="switch" id="permissao-{{$permissao->id}}" name="permissoes[{{$permissao->id}}]">
                                    <label class="form-check-label" for="ativo">{{$permissao->nome}}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </form>
    </div>
    <div class="form-footer">
        <div class="form-content">
            @permissao('permissoes.gerenciar')
                <button type="button" class="btn btn-success btn-ok" onclick="formAjax('#salvar_permissoes_form')">Salvar</button>
            @endpermissao
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Initialize the tabs
        $('#myTab a').on('click', function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    });
</script>
