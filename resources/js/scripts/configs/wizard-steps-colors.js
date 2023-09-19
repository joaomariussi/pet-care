// live Icon mudança de cor na mudança de estado
$(document).ready(function () {
    $(".current").find(".step-icon").addClass("bx bx-time-five");
    $(".current").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
        strokeColor: '#5A8DEE'
    });
});
// Icon mudando de estado
// se clicar no ícone do próximo botão mudar
$(".actions [href='#next']").click(function () {
    $(".done").find(".step-icon").removeClass("bx bx-time-five").addClass("bx bx-check-circle");
    $(".current").find(".step-icon").removeClass("bx bx-check-circle").addClass("bx bx-time-five");
    // live icon mudança de cor no próximo botão ao clicar
    $(".current").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
        strokeColor: '#5A8DEE'
    });
    $(".current").prev("li").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
        strokeColor: '#39DA8A'
    });
});
$(".actions [href='#previous']").click(function () {
    // live icon mudança de cor do ícone no próximo botão ao clicar
    $(".current").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
        strokeColor: '#5A8DEE'
    });
    $(".current").next("li").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
        strokeColor: '#adb5bd'
    });
});
// se clicar no ícone do botão enviar alterar
$(".actions [href='#finish']").click(function () {
    console.log(`aqui`);
    $(".done").find(".step-icon").removeClass("bx-time-five").addClass("bx bx-check-circle");
    $(".last.current.done").find(".fonticon-wrap .livicon-evo").updateLiviconEvo({
        strokeColor: '#39DA8A'
    });
});
// adicionar classe btn primary
$('.actions a[role="menuitem"]').addClass("btn btn-primary");
$('.icon-tab [role="menuitem"]').addClass("glow");
$('.wizard-vertical [role="menuitem"]').removeClass("btn-primary").addClass("btn-light-primary");
