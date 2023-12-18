@extends('admin.layouts.menusLayout')

@section('title', 'Detalhes do Candidato')

@section('page-styles')

@endsection

@section('content')
    <section class="details-products">
        <div class="row">
            <div class="col-12 col-xl-12">
                <!-- Breadcrumb with Divider Starts -->
                <section id="breadcrumb-divider">
                    <div class="row">
                        <div class="card-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-cadastros">
                                    <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-house"></i></a></li>
                                    <li class="breadcrumb-item">Gerenciamento</li>
                                    <li class="breadcrumb-item"><a href="{{route('jobs')}}">Trabalhe Conosco</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('jobs')}}">Lista de Vagas</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('jobs.view-received', $resumes[0]['id'])}}">Currículos Recebidos</a></li>
                                    <li class="breadcrumb-item active">Detalhes do Candidato</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </section>
                <!-- Default Breadcrumb Ends -->


                <!-- Título -->
                <b class="title-geral-etapas-sub">Detalhes do Candidato: {{$resumes[0]['name']}}  </b>

                <!-- Instruções -->
                <p>Visualize abaixo os detalhes do candidato selecionado!</p>

                <div class="row">
                    <div class="col-12 col-md-4 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <small class="text-muted text-uppercase">Informações do Candidato</small>

                                <div class="info-container">
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li class="mb-3">
                                            <i class="fa-solid fa-building"></i>
                                            <span class="fw-bold">Setor:</span>
                                            <span class="w-100 d-block">{{$resumes[0]['job']['sectors']['name']}}</span>
                                        </li>
                                        <li class="mb-3">
                                            <i class="fa-solid fa-briefcase"></i>
                                            <span class="fw-bold">Vaga:</span>
                                            <span class="w-100 d-block">{{$resumes[0]['job']['name']}}</span>
                                        </li>
                                        <li class="mb-3">
                                            <i class="fa-solid fa-scroll"></i>
                                            <span class="fw-bold">Nome:</span>
                                            <span class="w-100 d-block">{{$resumes[0]['name']}}</span>
                                        </li>
                                        <li class="mb-3">
                                            <i class="fa-solid fa-envelope"></i>
                                            <span class="fw-bold">E-mail:</span>
                                            <span class="w-100 d-block">{{$resumes[0]['email']}}</span>
                                            <a class="btn-link" target="_blank"
                                               href="mailto:{{$resumes[0]['email']}}?subject=Currículo%20Enviado">
                                                Enviar e-mail
                                            </a>
                                        </li>
                                        <li class="mb-3">
                                            <i class="fa-solid fa-phone"></i>
                                            <span class="fw-bold">Telefone:</span>
                                            <span class="w-100 d-block">{{$resumes[0]['phone']}}</span>
                                            <a class="btn-link" target="_blank"
                                               href="https://api.whatsapp.com/send?phone={{$resumes[0]['phone_number']}}&text=Olá%20{{$resumes[0]['name']}}
                                               %20somos%20da%20Cassul%20Distribuidora,%20recebemos%20o%20seu%20cadastro%20para%20a
                                               %20vaga%20de%20{{$resumes[0]['job']['name']}}.%20Você%20ainda%20tem%20interesse?">
                                                Entrar em contato
                                            </a>
                                        </li>
                                        <li class="mb-3">
                                            <i class="fa-solid fa-calendar"></i>
                                            <span class="fw-bold">Data de Nascimento:</span>
                                            <span class="w-100 d-block">{{\Carbon\Carbon::parse($resumes[0]['birth_date'])->format('d/m/Y')}}</span>
                                        </li>
                                        <li class="mb-3">
                                            <i class="fa-solid fa-map-marker"></i>
                                            <span class="fw-bold">Cidade - Estado</span>
                                            <span class="w-100 d-block">{{$resumes[0]['city']}} - {{$resumes[0]['state']}}</span>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-calendar"></i>
                                            <span class="fw-bold">Recebido em:</span>
                                            <span class="w-100 d-block">{{\Carbon\Carbon::parse($resumes[0]['created_at'])->format('d/m/Y')}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-8 col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <small class="text-muted text-uppercase">Visualizar Currículo</small>

                                <div class="mt-3">
                                    <div class="uploader">
                                        <div id="file-drag">
                                            <embed id="pdf-embed" style="width: 100%;" src="{{asset('imports/curriculos/'.$resumes[0]['file_pdf'])}}"
                                                   type="application/pdf" height="400">

                                            <div id="file-drag">
                                                <img id="file-image" src="#" alt="Preview" class="hidden">
                                                <div id="response" class="hidden">
                                                    <div id="messages"></div>
                                                    <progress class="progress" id="file-progress" value="0">
                                                        <span>0</span>%
                                                    </progress>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page-scripts')
    <script src="{{asset(mix('js/scripts/extensions/upload-pdf.js'))}}"></script>
@endsection
