$(function () {
    var animasi = `<div class="animation ">
    <div class="flip-to-square ">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>`
    // $('.main-animation').append(animasi)
    $(".animation").fadeIn(500, function () {
        $(this).fadeOut();
    });
});
