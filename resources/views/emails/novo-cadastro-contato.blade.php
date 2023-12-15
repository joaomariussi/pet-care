<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Contato Recebido</title>
    <style>
        /* Reset de estilos para garantir consistência */
        body, p {
            margin: 0;
            padding: 0;
        }

        @media only screen and (max-width: 767px) {
            body {
                padding: 0 !important;
            }

            .container {
                max-width: 100%;
                padding: 0 !important;
            }

            .product-image {
                max-width: 50px !important;
            }
        }
    </style>
</head>

<body style="font-family: Arial, sans-serif;background-color: #f7f7f7; text-align: center; padding: 20px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center"
       style="margin: auto; width: 100%; max-width: 600px;">
    <tr>
        <td>
            <div class="container"
                 style="background-color: #ffffff; padding: 20px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); max-width: 600px; margin: 0 auto;">
                <div class="header"
                     style="background-color: #f36e4a; color: #ffffff; padding: 20px 0; border-radius: 10px 10px 0 0; display: flex; justify-content: center;
                     align-items: center;">
                    <img src="https://i.postimg.cc/nh5zvM0L/logo-white.png" alt="Logo da Loja" class="logo"
                         style="max-width: 150px; margin: 0 auto; display: block; outline: none; height: auto; text-decoration: none;">
                </div>
                <h1 style="margin: 15px 0; color: #000000;font-size: 24px; text-align: center;">Formulário de Contato Recebido!</h1>
                <span class="user-order" style="font-weight: 700; font-size: 16px; color: #838383; text-align: center;">
                    Olá, {{$sector->email_sector}}
                </span>
                <p class="summary-order" style="font-weight: 400; font-size: 14px; color: #838383; margin-top: 10px; text-align: center;">
                    Você recebeu um novo contato através do formulário do site.
                </p>

                <div style="border-bottom: 1px solid #f2f2f2; margin: 20px 0;" class="border-divider"></div>

                <div class="details-order" style="text-align: left;">
                    <h1>
                        Detalhes do Contato
                    </h1>
                    <p class="user-order" style="margin-bottom: 10px;">
                        <b>Setor:</b> {{$sector->name}}
                    </p>
                    <p class="user-order" style="margin-bottom: 10px;">
                        <b>Nome:</b> {{$contacts->name}}
                    </p>
                    <p class="summary-order" style="margin-bottom: 10px; margin-top: 10px;">
                        <b>E-mail:</b> {{$contacts->email}}
                    </p>
                    <p class="summary-order" style="margin-bottom: 10px;">
                        <b>CNPJ:</b> {{$contacts->cnpj}}
                    </p>
                    <p class="summary-order" style="margin-bottom: 10px;">
                        <b>Telefone:</b> {{$contacts->phone_number}}
                    </p>
                    <p class="summary-order" style="margin-bottom: 10px;">
                        <b>Cidade - Estado:</b> {{$contacts->city_name}}/{{$contacts->state_uf}}
                    </p>
                    <p class="summary-order" style="margin-bottom: 10px;">
                        <b>Assunto:</b> {{$contacts->subject}}
                    </p>
                    <p class="summary-order">
                        <b>Mensagem:</b> {{$contacts->message}}
                    </p>
                </div>
            </div>
        </td>
    </tr>
</table>
</body>
</html>
