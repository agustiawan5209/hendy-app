$(function () {
    // $('.main-animation').append(animasi)
    $(".animation-loading").fadeIn(500, function () {
        $(this).fadeOut();
    });
    var SizeWindow = window.innerWidth;
    $(".btnSidebar").click(function (e) {
        e.preventDefault();
        if (SizeWindow > 768) {
            $("#Sidebar").toggleClass('-translate-x-64 transititon-all ease-in-out')
            $("#content").toggleClass('md:ml-[25%] lg:ml-[15%]', 'w-full');
        }
        if (SizeWindow < 768) {
            $("#Sidebar").toggleClass('hidden', "w-1/3");
        }
    })

});
