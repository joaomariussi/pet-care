(function (window, document, $) {

    /***********************/
    // Component Variables //
    /***********************/
    let accordion = $(".accordion"),
        defaultaccordion = $(".accordion .card-header"),
        collapseTitle = $(".collapsible .card-header"),
        collapseHoverTitle = $(".card-hover .card-header"),
        dropdownMenuIcon = $(".dropdown-icon-wrapper .dropdown-item");

    // To open Collapse on hover
    if (accordion.attr("data-toggle-hover", "true")) {
        collapseHoverTitle.closest(".card").on("mouseenter", function () {
            let $this = $(this);
            $this.children(".collapse").collapse("show");
            $this.closest(".card").addClass("open");
        });
        collapseHoverTitle.closest(".card").on("mouseleave", function () {
            let $this = $(this);
            $this.children(".collapse").collapse("hide");
            $this.closest(".card").removeClass("open");
        });
    }
    // When Collapse open on click
    collapseTitle.on("click", function () {
        let $this = $(this);
        $this.next(".collapse").on('show.bs.collapse', function () {
            $this.parent().addClass("open")
        })
        $this.next(".collapse.show").on('hide.bs.collapse', function () {
            $this.parent().removeClass("open")
        })
    });
    // When accordion open on click
    defaultaccordion.on("click", function () {
        let $this = $(this);
        if ($this.parent().next(".show")) {
            $this.closest(".card").toggleClass("open");
            $this.closest(".card").siblings(".open").removeClass("open");
        }
    });

    /************/
    // Dropdown //
    /************/
    // For Dropdown With Icons
    dropdownMenuIcon.on("click", function () {
        $(".dropdown-icon-wrapper .dropdown-toggle i").remove();
        $(this).find("i").clone().appendTo(".dropdown-icon-wrapper .dropdown-toggle");
        $(".dropdown-icon-wrapper .dropdown-toggle .dropdown-item").removeClass("dropdown-item");
    });

    /*********/
    // Chips //
    /*********/
    // To close chips
    $('.chip-closeable').on('click', function () {
        $(this).closest('.chip').remove();
    })

})(window, document, jQuery);


/* Reload se deslogado */
function authCheck($requestResult) {
    //419 quer dizer falha no CSRF, nesse caso também representa logged_out
    if ($requestResult === "logged_out" || $requestResult === 419) {
        window.location.reload()
    }
}

let offcanvasElementList = [].slice.call(document.querySelectorAll('.offcanvas'))
let offcanvasList = offcanvasElementList.map(function (offcanvasEl) {
    return new bootstrap.Offcanvas(offcanvasEl)
})
