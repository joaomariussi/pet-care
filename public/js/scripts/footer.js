
// Verifique se a janela está no topo, caso contrário, mostra o botão de exibição
$(document).ready(function(){
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scroll-top').fadeIn();
        } else {
            $('.scroll-top').fadeOut();
        }
    });

    // Clique no evento para rolar para o topo
    $('.scroll-top').click(function(){
        $('html, body').animate({scrollTop : 0},1000);
    });
});

function notifySuccess(message, title = null, progressBar = true) {
    toastr.success(
        message,
        title ? title : 'Sucesso!',
        { "progressBar": progressBar }
    );
}

function notifyError(message, title = null, progressBar = true) {
    toastr.error(
        message,
        title ? title : 'Erro!',
        { "progressBar": progressBar }
    );
}

function notifyWarning(message, title = null, progressBar = true) {
    toastr.warning(
        message,
        title ? title : 'Atenção!',
        { "progressBar": progressBar }
    );
}

function notifyInfo(message = '', title = null, progressBar = true) {
    toastr.info(
        message,
        title ? title : 'Informação!',
        { "progressBar": progressBar }
    );
}


