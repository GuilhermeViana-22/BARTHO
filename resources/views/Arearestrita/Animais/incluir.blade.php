@extends('adminpanel', ['admincss' => true])

@section('content')

    <div class="page-header">
        <h4>Inclusão de um animal</h4>
    </div>

    <form action="{{ route('login') }}" method="POST" class="row">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    <i class="fa fa-times" aria-hidden="true"></i> {{$error}}
                </div>
            @endforeach
        @endif

        @csrf

        <div class="form-panel">

            <div class="form-body">
                <p>dsadasasdasdas</p>
                <p>dsadasasdasdas</p>
                <p>dsadasasdasdas</p><p>dsadasasdasdas</p>

            </div>
            <div class="form-footer">
                <div class="form-content">
                    <p>dsadasasdasdas</p>
                </div>
            </div>
        </div>


    </form>
@endsection
