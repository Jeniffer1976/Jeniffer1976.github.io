// (function ($) {
//     $.fn.replaceClass = function (pFromClass, pToClass) {
//         return this.removeClass(pFromClass).addClass(pToClass);
//     };
// }(jQuery));
// function isInViewport(element) {
//     const rect = element.getBoundingClientRect();
//     return (
//         rect.top >= 0 &&
//         rect.left >= 0 &&
//         rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
//         rect.right <= (window.innerWidth || document.documentElement.clientWidth)
//     );
// }

function scrollFunction() {
    if (document.body.scrollTop > 120 || document.documentElement.scrollTop > 120) {
        $("nav a").removeClass("active");
        $("#topBtn").css(
            "opacity", "1"
        );
    } else {
        $('#' + curr.toString()).addClass("active");
        $("#topBtn").css(
            "opacity", "0"
        );
    }
}

function cursorMovement(e) {
    cursor.style.left = e.pageX + "px";
    cursor.style.top = e.pageY + "px";
}


function resetForm() {
    $("#name").val("");
    $("#email").val("");
    $("#msg").val("");
}

function vidControls(section) {
    $('[type="radio"][name="'+section+'"]').click(function() {
        document.querySelectorAll('label video:first-child').forEach(vid => vid.pause()); // pauses all videos
        document.querySelectorAll('label video:first-child').forEach(vid => vid.removeAttribute("controls"));
        // document.querySelectorAll('.mobDev .info').forEach(info => info.css("display","none"));
        
        var radId = $('[name="'+section+'"][type="radio"]:checked').attr('id');
        var vid = document.querySelector("[for='"+radId+"'] video");
        // var info = document.querySelector("[for='"+radId+"'] .info");
        // info.css("display","block")
    
        vid.currentTime = '0';
        vid.play();
        vid.setAttribute("controls","");
    });
}

function cardHover() {
    var cursor = document.querySelector(".cursor")
    cursor.style.boxShadow = "0 0 20px white, inset 0 0 20px black";
   
}

function cardOut() {
    var cursor = document.querySelector(".cursor")
    cursor.style.boxShadow = "0 0 20px white, inset 0 0 20px white";
}

$('.card video, .card img').each(function() {
  $(this).attr('onmouseover','cardHover()') ;
  $(this).attr('onmouseleave','cardOut()') ;
});

var curr = ""
$(document).ready(function () {
    curr = $("a.navList.active").attr('id'); // gets the current page's id
});


$(window).on('load',function(){
    $('.loader').fadeOut(1000);
    $('.content').fadeIn(1000);
});

window.onscroll = function () {
    scrollFunction();
};


window.addEventListener("mousemove", cursorMovement);
var cursor = document.querySelector(".cursor")



$("#wdNav").click(function () {
    var el = document.getElementById("wdDiv");
    el.scrollIntoView(true);
});

$("#psNav").click(function () {
    var el = document.getElementById("psDiv");
    el.scrollIntoView(true);
});

$("#mbNav").click(function () {
    var el = document.getElementById("mbDiv");
    el.scrollIntoView(true);
});

vidControls("MBslider");
vidControls("webSlider");
vidControls("PSslider2");

$(".bgShape").hover(function () {
    $(this).css(
        "transform", "rotate(90deg)"
    );
    $(this).find("img").css(
        "transform", "rotate(-90deg)"
    );
    $(this).prev().css(
        "opacity", "100"
    );
});
$(".bgShape").mouseleave(function () {
    $(this).css(
        "transform", "rotate(45deg)"
    );
    $(this).find("img").css(
        "transform", "rotate(-45deg)"
    );
    $(this).prev().css(
        "opacity", "0"
    );
});

$(".contactBtn").hover(function () {
    $(this).find(":first-child()").css(
        "color", "#F0A095"
    );
});

$(".contactBtn").mouseleave(function () {
    $(this).find(":first-child()").css(
        "color", "#9ED0E7"
    );
});
