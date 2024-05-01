@extends('layout')

@section('content')


<div class="container" style="margin-top: 30px">
    <div style="width: 100%; display: flex; flex-direction: column; padding: 50px; border: 1px solid #e9cc66; border-radius: 20px">
        <div style="margin-left: auto; margin-right: auto">
            <img width="200px" alt="foto de cachorro" src="{{ asset('img/ativo2.png') }}">
        </div>
        <div class="col-md-6 login-form">
            <form action="{{ route('login') }}" method="POST">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <i class="fa fa-times" aria-hidden="true"></i> {{$error}}
                    </div>
                    @endforeach
                @endif

                @csrf
                <div class="form-group mt-3">
                    <input type="email" value="{{old('email')}}" class="form-control" name="email" placeholder="E-mail">
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="password" placeholder="Senha">
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Logar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
