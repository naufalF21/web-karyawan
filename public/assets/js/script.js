$(document).ready(function () {
    $("#dataTable").DataTable({
        paging: true,
        responsive: true,
        select: true,
        info: true,
        searching: true,
        // scrollY: 400,
    });
    $(".toast").toast("show");

    $('[data-toggle="popover"]').popover({
        html: true,
    });
});

(function ($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function () {
        if (this.href === path) {
            $(this).addClass("active");
        }
    });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function (e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });

    // $(".toast").toast("show");
})(jQuery);
