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
    // how to make function click events jquery compatible
    $(".plusSubKriteria").click(function (e) {
        e.preventDefault();
        var input = document.createElement('input');
        input.type = 'text';
        input.classList.add('input')
        input.classList.add('input-bordered')
        input.classList.add('w-full')
        input.classList.add('max-w-xs')
        input.placeholder = 'masukkan nama sub kriteria';
        input.name = 'subkriteria[]';
        $(".contentSubKriteria").append(input)

    });


});
