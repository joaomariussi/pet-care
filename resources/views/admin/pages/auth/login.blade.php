@extends('admin.layouts.fullLayoutMaster')
{{-- page title --}}
@section('title','Login')
{{-- page scripts --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{ mix('css/admin/pages/authentication.css')}}">
@endsection

@section('content')
    <div class="authentication-wrapper authentication-cover">
            <div class="authentication-inner row">
                <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center background_img">
                <div class="flex-row text-center mx-auto">
                    <img src="{{asset('images/Login.webp')}}" alt="Backgroud imagem login"
                         class="img-fluid authentication-cover-img">
                </div>
            </div>

            <div class="d-flex col-12 col-lg-5 col-xl-4 authentication-bg p-sm-5 p-4">
                <div class="w-px-400 mx-auto w-100">
                    <div class="app-brand mb-4">
                        <a href="#" class="app-brand-link gap-2 mb-2">
                            <span class="app-brand-logo demo">
                                <img class="img-fluid" src="{{asset('images/logo-login.png')}}" alt="Logo Cassul">
                            </span>
                        </a>
                    </div>
                    <h4 class="mb-2">Bem-vindo(a) 👋</h4>
                    <p class="mb-4">Acesse o painel de gerenciamento do seu sistema.</p>

                    <form id="formAuthentication" class="mb-3" action="{{ route('authenticate') }}"
                          method="POST">
                        @csrf

                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label  for="email">E-mail*</label>
                                    <div class="input-group">
                                        <input type="email" id="email"
                                               class="form-control form-control-lg  @error('email') is-invalid @enderror"
                                               value="{{old('email')}}"
                                               name="email"
                                               placeholder="E-mail"/>
                                    </div>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password">Senha*</label>
                                    <input type="password"
                                           class="form-control form-control-lg @error('password') is-invalid @enderror"
                                           id="password"
                                           value="{{old('password')}}"
                                           name="password"
                                           placeholder="Senha">
                                    <span toggle="#password" class="fa -fa-fw fa-eye field-icon toggle-password"></span>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                    </div>
                                    @enderror
                                    @if($errors->any())
                                        <div class="alert alert-danger mt-3" role="alert">
                                            <ul class="mb-0 p-0 list-unstyled">
                                                <li>
                                                    <i class="fa-solid fa-triangle-exclamation"></i> Usuário ou senha inválidos
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="forgotAndAcess">
                                    <div class="checkbox">
                                        <input type="checkbox"
                                               class="checkbox-input"
                                               name="remember"
                                               value="1"
                                               id="lembrar_acesso">
                                        <label for="lembrar_acesso">Lembrar meu acesso</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-success btn-block w-100">
                                    <i class="fa-solid fa-right-to-bracket"></i> Acessar
                                </button>
                                <input type="hidden">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    <script src="{{asset('js/scripts/pages/authentication.js')}}"></script>
@endsection
