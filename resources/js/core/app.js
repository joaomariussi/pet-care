; (function (window, document, $) {
    "use strict"
    var $html = $("html")
    var $body = $("body")
    var $danger = "#FF5B5C"
    var $primary = "#5A8DEE"
    var $primary_lighten = "#e7edf3"
    var $warning = "#FDAC41"
    var $textcolor = "#304156"

    function scrollTopFn(){
        var $scrollTop = $(window).scrollTop();
        if ($scrollTop > 60) {
            $("body").addClass("navbar-scrolled");
        }else{
            $("body").removeClass("navbar-scrolled");
        }
        if ($scrollTop > 20) {
            $("body").addClass("page-scrolled");
        }
        else{
            $("body").removeClass("page-scrolled");
        }
    }
    $(window).scroll(function () {
        scrollTopFn();
    });

    $(window).on("load", function () {
        var rtl
        var compactMenu = false // Set it to true, if you want default menu to be compact

        if ($body.hasClass("menu-collapsed")) {
            compactMenu = true
        }

        if ($("html").data("textdirection") == "rtl") {
            rtl = true
        }

        setTimeout(function () {
            $html.removeClass("loading").addClass("loaded")
        }, 1200)

        $.app.menu.init(compactMenu)

        // Navigation configurations
        var config = {
            speed: 300 // set speed to expand / collpase menu
        }
        if ($.app.nav.initialized === false) {
            $.app.nav.init(config)
        }

        Unison.on("change", function (bp) {
            $.app.menu.change(compactMenu)
        })

        // Tooltip Initialization
        $('[data-toggle="tooltip"]').tooltip({
            container: "body"
        })

        // Tooltip For Horizontal Layout - Bookmark Icons
        /* tooltip-horizontal-bookmark - Add Custom Class */
        $(".tooltip-horizontal-bookmark").tooltip({
            customClass: "tooltip-horizontal-bookmark"
        })

        // Collapsible Card
        $('a[data-action="collapse"]').on("click", function (e) {
            e.preventDefault()
            $(this)
                .closest(".card")
                .children(".card-content")
                .collapse("toggle")
            // Adding bottom padding on card collapse
            $(this)
                .closest(".card")
                .children(".card-header")
                .css("padding-bottom", "1.5rem")
            $(this)
                .closest(".card")
                .find('[data-action="collapse"]')
                .toggleClass("rotate")
        })

        // Toggle fullscreen
        $('a[data-action="expand"]').on("click", function (e) {
            e.preventDefault()
            $(this)
                .closest(".card")
                .find('[data-action="expand"] i')
                .toggleClass("bx-fullscreen bx-exit-fullscreen")
            $(this)
                .closest(".card")
                .toggleClass("card-fullscreen")
        })

        //  Notifications & messages scrollable
        $(".scrollable-container").each(function () {
            var scrollable_container = new PerfectScrollbar($(this)[0], {
                wheelPropagation: false
            })
        })

        // Add sidebar group active class to active menu
        $(".main-menu-content")
            .find("li.active")
            .parents("li")
            .addClass("sidebar-group-active")

        // Add open class to parent list item if subitem is active except compact menu
        var menuType = $body.data("menu")
        if (menuType != "horizontal-menu" && compactMenu === false) {
            $(".main-menu-content")
                .find("li.active")
                .parents("li")
                .addClass("open")
        }
        if (menuType == "horizontal-menu") {
            $(".main-menu-content")
                .find("li.active")
                .parents("li:not(.nav-item)")
                .addClass("open")
            $(".main-menu-content")
                .find("li.active")
                .parents("li")
                .addClass("active")
        }

        //card heading actions buttons small screen support
        $(".heading-elements-toggle").on("click", function () {
            $(this)
                .next(".heading-elements")
                .toggleClass("visible")
        })

        //  Dynamic height for the chartjs div for the chart animations to work
        var chartjsDiv = $(".chartjs"),
            canvasHeight = chartjsDiv.children("canvas").attr("height")
        chartjsDiv.css("height", canvasHeight)

        if ($body.hasClass("boxed-layout")) {
            if ($body.hasClass("vertical-overlay-menu")) {
                var menuWidth = $(".main-menu").width()
                var contentPosition = $(".app-content").position().left
                var menuPositionAdjust = contentPosition - menuWidth
                if ($body.hasClass("menu-flipped")) {
                    $(".main-menu").css("right", menuPositionAdjust + "px")
                } else {
                    $(".main-menu").css("left", menuPositionAdjust + "px")
                }
            }
        }

        //Custom File Input
        $(".custom-file input").change(function (e) {
            $(this)
                .next(".custom-file-label")
                .html(e.target.files[0].name)
        })

        /* Text Area Counter Set Start */

        $(".char-textarea").on("keyup", function (event) {
            checkTextAreaMaxLength(this, event)
            // to later change text color in dark layout
            $(this).addClass("active")
        })

        /*
        Checks the MaxLength of the Textarea
        -----------------------------------------------------
        @prerequisite:  textBox = textarea dom element
                e = textarea event
                        length = Max length of characters
        */
        function checkTextAreaMaxLength(textBox, e) {
            var maxLength = parseInt($(textBox).data("length"))

            if (!checkSpecialKeys(e)) {
                if (textBox.value.length < maxLength - 1)
                    textBox.value = textBox.value.substring(0, maxLength)
            }
            $(".char-count").html(textBox.value.length)

            if (textBox.value.length > maxLength) {
                $(".counter-value").css("background-color", $danger)
                $(".char-textarea").css("color", $danger)
                // to change text color after limit is maxedout out
                $(".char-textarea").addClass("max-limit")
            } else {
                $(".counter-value").css("background-color", $primary)
                $(".char-textarea").css("color", $textcolor)
                $(".char-textarea").removeClass("max-limit")
            }

            return true
        }
        /*
        Checks if the keyCode pressed is inside special chars
        -------------------------------------------------------
        @prerequisite:  e = e.keyCode object for the key pressed
        */
        function checkSpecialKeys(e) {
            if (
                e.keyCode != 8 &&
                e.keyCode != 46 &&
                e.keyCode != 37 &&
                e.keyCode != 38 &&
                e.keyCode != 39 &&
                e.keyCode != 40
            )
                return false
            else return true
        }

        $(".content-overlay").on("click", function () {
            $(".search-list").removeClass("show")
            $(".app-content").removeClass("show-overlay")
            $(".bookmark-wrapper .bookmark-input").removeClass("show")
        })

        // To show shadow in main menu when menu scrolls
        var container = document.getElementsByClassName("main-menu-content")
        if (container.length > 0) {
            container[0].addEventListener("ps-scroll-y", function () {
                if (
                    $(this)
                        .find(".ps__thumb-y")
                        .position().top > 0
                ) {
                    $(".shadow-bottom").css("display", "block")
                } else {
                    $(".shadow-bottom").css("display", "none")
                }
            })
        }
    })

    // Hide overlay menu on content overlay click on small screens
    $(document).on("click", ".sidenav-overlay", function (e) {
        // Hide menu
        $.app.menu.hide()
        return false
    })


    $(document).on("click", ".menu-toggle, .modern-nav-toggle", function (e) {
        e.preventDefault()

        // Toggle menu
        $.app.menu.toggle()

        setTimeout(function () {
            $(window).trigger("resize")
        }, 200)

        if ($("#collapsed-sidebar").length > 0) {
            setTimeout(function () {
                if ($body.hasClass("menu-expanded") || $body.hasClass("menu-open")) {
                    $("#collapsed-sidebar").prop("checked", false)
                } else {
                    $("#collapsed-sidebar").prop("checked", true)
                }
            }, 1000)
        }

        // Hides dropdown on click of menu toggle
        // $('[data-toggle="dropdown"]').dropdown('hide');

        // Hides collapse dropdown on click of menu toggle
        if (
            $(
                ".vertical-overlay-menu .navbar-with-menu .navbar-container .navbar-collapse"
            ).hasClass("show")
        ) {
            $(
                ".vertical-overlay-menu .navbar-with-menu .navbar-container .navbar-collapse"
            ).removeClass("show")
        }

        return false
    })

    // Add Children Class
    $(".navigation")
        .find("li")
        .has("ul")
        .addClass("has-sub")


    // Page full screen
    $(".nav-link-expand").on("click", function (e) {
        if (typeof screenfull != "undefined") {
            if (screenfull.enabled) {
                screenfull.toggle()
            }
        }
    })
    if (typeof screenfull != "undefined") {
        if (screenfull.enabled) {
            $(document).on(screenfull.raw.fullscreenchange, function () {
                if (screenfull.isFullscreen) {
                    $(".nav-link-expand")
                        .find("i")
                        .toggleClass("bx-exit-fullscreen bx-fullscreen")
                    $("html").addClass("full-screen")
                } else {
                    $(".nav-link-expand")
                        .find("i")
                        .toggleClass("bx-fullscreen bx-exit-fullscreen")
                    $("html").removeClass("full-screen")
                }
            })
        }
    }
    $(document).ready(function () {
        /**********************************
         *   Form Wizard Step Icon
         **********************************/
        $(".step-icon").each(function () {
            var $this = $(this)
            if ($this.siblings("span.step").length > 0) {
                $this.siblings("span.step").empty()
                $(this).appendTo($(this).siblings("span.step"))
            }
        })
    })

    // Update manual scroller when window is resized
    $(window).resize(function () {
        $.app.menu.manualScroller.updateHeight()
        // To show shadow in main menu when menu scrolls
        var container = document.getElementsByClassName("main-menu-content")
        if (container.length > 0) {
            container[0].addEventListener("ps-scroll-y", function () {
                if (
                    $(this)
                        .find(".ps__thumb-y")
                        .position().top > 0
                ) {
                    $(".shadow-bottom").css("display", "block")
                } else {
                    $(".shadow-bottom").css("display", "none")
                }
            })
        }
    })

    $("#sidebar-page-navigation").on("click", "a.nav-link", function (e) {
        e.preventDefault()
        e.stopPropagation()
        var $this = $(this),
            href = $this.attr("href")
        var offset = $(href).offset()
        var scrollto = offset.top - 80 // minus fixed header height
        $("html, body").animate(
            {
                scrollTop: scrollto
            },
            0
        )
        setTimeout(function () {
            $this
                .parent(".nav-item")
                .siblings(".nav-item")
                .children(".nav-link")
                .removeClass("active")
            $this.addClass("active")
        }, 100)
    })

    /********************* Bookmark & Search ***********************/
        // This variable is used for mouseenter and mouseleave events of search list
    var $filename = $(".search-input input").data("search")

    // Bookmark icon click
    $(".bookmark-wrapper .bookmark-star").on("click", function (e) {
        e.stopPropagation()
        $(".bookmark-wrapper .bookmark-input").toggleClass("show")
        $(".bookmark-wrapper .bookmark-input input").val("")
        $(".bookmark-wrapper .bookmark-input input").blur()
        $(".bookmark-wrapper .bookmark-input input").focus()
        $(".bookmark-wrapper .search-list").addClass("show")

        var arrList = $("ul.nav.navbar-nav.bookmark-icons li"),
            $arrList = "",
            $activeItemClass = ""

        $("ul.search-list li").remove()

        for (var i = 0; i < arrList.length; i++) {
            if (i === 0) {
                $activeItemClass = "current_item"
            } else {
                $activeItemClass = ""
            }
            $arrList +=
                '<li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer ' +
                $activeItemClass +
                '">' +
                '<a class="d-flex align-items-center justify-content-between w-100" href=' +
                arrList[i].firstChild.href +
                ">" +
                '<div class="d-flex justify-content-start">' +
                '<span class="mr-75 ' +
                arrList[i].firstChild.firstChild.className +
                '"  data-icon="' +
                arrList[i].firstChild.firstChild.className +
                '"></span>' +
                "<span>" +
                arrList[i].firstChild.dataset.originalTitle +
                "</span>" +
                "</div>" +
                '<span class="float-right bookmark-icon bx bx-star warning"></span>' +
                "</a>" +
                "</li>"
        }
        $("ul.search-list").append($arrList)
    })

    // Navigation Search area Open
    $(".nav-link-search").on("click", function () {
        var $this = $(this)
        var searchInput = $(this)
            .parent(".nav-search")
            .find(".search-input")
        searchInput.addClass("open")
        $(".search-input input").focus()
        $(".search-input .search-list li").remove()
        $(".search-input .search-list").addClass("show")
        $(".bookmark-wrapper .bookmark-input").removeClass("show")
    })

    // Navigation Search area Close
    $(".search-input-close i").on("click", function () {
        var $this = $(this),
            searchInput = $(this).closest(".search-input")
        if (searchInput.hasClass("open")) {
            searchInput.removeClass("open")
            $(".search-input input").val("")
            $(".search-input input").blur()
            $(".search-input .search-list").removeClass("show")
            if ($(".app-content").hasClass("show-overlay")) {
                $(".app-content").removeClass("show-overlay")
            }
        }
    })

    // Navigation Search area Close on click of app-content
    $(".app-content").on("click", function () {
        var $this = $(".search-input-close"),
            searchInput = $($this).parent(".search-input")
        if (searchInput.hasClass("open")) {
            searchInput.removeClass("open")
        }
    })

})(window, document, jQuery)
