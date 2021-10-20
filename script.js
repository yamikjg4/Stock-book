$(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        document.getElementById("bodyContent").style.width = "100%";
    });
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
});