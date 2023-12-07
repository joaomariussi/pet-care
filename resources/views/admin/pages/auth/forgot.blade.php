@extends('layouts.fullLayoutMaster')
{{-- page title --}}
@section('title','Login')
{{-- page scripts --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{ mix('css/pages/authentication.css')}}">
@endsection

@section('content')
    <div class="authentication-wrapper authentication-cover">
        <div class="authentication-inner row">
            <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center background_img">
                <div class="flex-row text-center mx-auto">
                    <img src="{{asset('images/Login.webp')}}" alt="Backgroud imagem login" class="img-fluid authentication-cover-img">
                </div>
            </div>

            <div class="d-flex col-12 col-lg-5 col-xl-4 authentication-bg p-sm-5 p-4">
                <div class="w-px-400 mx-auto w-100">
                    <div class="app-brand mb-4">
                        <a href="{{route('login')}}" class="app-brand-link gap-2 mb-2">
                            <span class="app-brand-logo demo">
                                <img class="img-fluid logo-empresa" src="{{asset('images/rocky-logo.webp')}}" alt="Logo parceiros">
                            </span>
                        </a>
                    </div>
                    <h4 class="mb-2">Bem-vindo(a) 👋</h4>
                    <p class="mb-4">Informe o seu e-mail para envio da solicitação de redifinição de senha!</p>

                    <form method="POST" action="{{route('forgot.post')}}">
                        @csrf
                        <div class="form-outline mb-3">
                            <label class="form-label align-items-start label-create" for="email">E-mail</label>
                            <input type="email" id="email"
                                   class="form-control form-control-lg  @error('email') is-invalid @enderror"
                                   value="{{old('email')}}"
                                   name="email"
                                   placeholder="E-mail"/>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn__login btn-block w-100">
                            Recuperar senha
                        </button>

                        <a href="{{route('login')}}" class="btn btn-secondary mt-3 buttn_back">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>

                        <input type="hidden">
                    </form>


                    <div class="divider my-4">
                        <div class="divider-text">Developed by Uniom Team</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
