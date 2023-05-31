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
// $('video').attr('id','aVid');


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
let options = {
    root: null,
    rootMargin: '0px',
    threshold: .6
}
let callback = (entries, observer) => {
    entries.forEach(entry => {
        if ((entry.target.id == "aVid") && $(entry.target).hasClass("vidActive")) {
            if (entry.isIntersecting) {
                entry.target.play();
            } else {
                entry.target.pause();
            }

        }
    });
}

let observer = new IntersectionObserver(callback, options);

function vidControls(section) {
    $('[type="radio"][name="' + section + '"]').click(function () {

        document.querySelectorAll('label video:first-child').forEach(vid => vid.pause()); // pauses all videos
        document.querySelectorAll('label video:first-child').forEach(vid => vid.removeAttribute("controls"));
        document.querySelectorAll('label video:first-child').forEach(vid => $(vid).removeClass("vidActive"));
        document.querySelectorAll('label video:first-child').forEach(vid => $(vid).attr('id', ''));

        var radId = $('[name="' + section + '"][type="radio"]:checked').attr('id');

        var vid = document.querySelector("[for='" + radId + "'] video");

        if (vid) {
            vid.currentTime = '0';
            vid.play();
            vid.setAttribute("controls", "");
            $(vid).addClass("vidActive");
            $(vid).attr('id', 'aVid');
            observer.observe(document.querySelector("#aVid"));

        }

    });
}


function heightControls(section, sectionCont) {
    $('[type="radio"][name="' + section + '"]').click(function () {
        var radId = $('[name="' + section + '"][type="radio"]:checked').attr('id');
        var secHeight = $("[for='" + radId + "'] .card-content").height() + 80;
        $("." + sectionCont).css(
            "height", secHeight + "px"
        );

    });
}

// $('[type="radio"][id="item-11"]').click(function() {
//     alert("test")
// });

function cardHover() {
    var cursor = document.querySelector(".cursor")
    cursor.style.boxShadow = "0 0 20px white, inset 0 0 20px black";

}

function cardOut() {
    var cursor = document.querySelector(".cursor")
    cursor.style.boxShadow = "0 0 20px white, inset 0 0 20px white";
}

$('.card video, .card img').each(function () {
    $(this).attr('onmouseover', 'cardHover()');
    $(this).attr('onmouseleave', 'cardOut()');
});

var curr = ""
$(document).ready(function () {
    curr = $("a.navList.active").attr('id'); // gets the current page's id
    // $('[type="radio"]:checked').click();
});


$(window).on('load', function () {
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

observer.observe(document.querySelector("#aVid"));

vidControls("webSlider");
vidControls("MBslider");
vidControls("PSslider2");

heightControls("webSlider", "webDev");
heightControls("PSslider", "photoshop");
heightControls("PSslider2", "photoshop2");
heightControls("MBslider", "mobDev");

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


tippy('#resume', {
    content: 'Download my resume',
    placement: "bottom",
    arrow: false,
});
