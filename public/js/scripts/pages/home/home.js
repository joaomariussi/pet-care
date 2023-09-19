
// Carousel slick de card de informações
$(document).ready(function() {

    let showChar = 655;
    let ellipsestext = "...";
    let moretext = "Ler Mais";
    let lesstext = "Ler Menos";


    $('.resumoParagrafoTarefa').each(function() {
        let content = $(this).html();

        if(content.length > showChar) {

            let c = content.substr(0, showChar);
            let h = content.substr(showChar, content.length - showChar);

            let html = c + '<span class="moreellipses">' + ellipsestext+ '</span><span class="morecontent"><span>' + h + '</span><a href="" class="morelink">' + moretext + '</a></span>';

            $(this).html(html);
        }

    });

    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});

