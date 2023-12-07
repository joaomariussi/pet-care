@extends('layouts.fullLayoutMaster')
{{-- page title --}}
@section('title','Login')
{{-- page scripts --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('mix/pages/authentication.css')}}">
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
                    <p class="mb-4">Informe a nova senha, e depois confirme-a!</p>

                    <form method="POST" action="{{ route('reset.post') }}">
                        @csrf
                        <input type="hidden" name="email" value="{{$credentials['email'] ?: old('email')}}"/>

                        <input type="hidden" name="token" value="{{$credentials['token'] ?: old('token')}}"/>

                        <div class="form-outline mt-2 mb-2">
                            <label class="form-label align-items-start label-create" for="senha">Senha</label>
                            <input type="password" id="senha"
                                   class="form-control form-control-lg @error('password') is-invalid @enderror"
                                   value="{{old('password')}}"
                                   name="password"
                                   placeholder="Senha"/>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-outline mt-2 mb-2">
                            <label class="form-label align-items-start label-create"
                                   for="password_confirmation">Confirmar senha</label>
                            <input type="password" id="password_confirm"
                                   class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                                   value="{{old('password_confirmation')}}"
                                   name="password_confirmation"
                                   placeholder="Confirmar senha"/>
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn__login btn-block w-100">
                            Alterar
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
