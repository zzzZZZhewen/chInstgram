$(document).ready(function() {

    $("#slide-img").owlCarousel({
        navigation : true,
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true,
        autoPlay:true
    });

    $("#owl-hot-topic").owlCarousel({
        autoPlay: 3000,
        items : 5,
        itemsMobile: [479, 3]
    });

    $("#owl-hot-topic").height($("#owl-hot-topic > div.owl-wrapper-outer > div > div:nth-child(1)").width());
    $("#search-advice-box").css('width', ($("#search-box").width() + 24) + "px");

    $("#search-box").focus(function(){
        $("#search-advice-box").slideToggle("slow");
        $("#search-advice-box").css('top', ($("#search-box").height() + 27) + "px");
        $("#search-advice-box").css('left', "30px");
    });
    $("#search-box").blur(function(){
        $("#search-advice-box").slideToggle("slow");
    });

    $("#search-box").bind('input propertychange', function() {
        $("#search-advice-topic a").html("Search by key words " + $(this).val());
        $("#search-advice-user a").html("Search by user name " + $(this).val());
    });
});

$(window).resize(function(){
    $("#owl-hot-topic").height($("#owl-hot-topic > div.owl-wrapper-outer > div > div:nth-child(1)").width());
    $("#search-advice-box").css('width', ($("#search-box").width() + 24) + "px");
});

function searchbyusername() {
    var input = $("#search-box").val();
    if (input != "")
    window.location.href = "result_for_users?key=" + input + "&rand=" + Math.floor( Math.random() * 10000);
}