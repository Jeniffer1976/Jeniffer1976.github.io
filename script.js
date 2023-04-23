// (function ($) {
//     $.fn.replaceClass = function (pFromClass, pToClass) {
//         return this.removeClass(pFromClass).addClass(pToClass);
//     };
// }(jQuery));
function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

var curr = ""
$(document).ready(function () {
    curr = $("a.navList.active").attr('id'); // gets the current page's id

});

window.onscroll = function () {
    scrollFunction();
};

window.addEventListener("mousemove", cursorMovement);

var cursor = document.querySelector(".cursor")

function cursorMovement(e) {
    cursor.style.left = e.pageX + "px";
    cursor.style.top = e.pageY + "px";
}


function scrollFunction() {
    // curr = curr.toString();
    if (document.body.scrollTop > 120 || document.documentElement.scrollTop > 120) {
        // $("nav a").toggleClass("active").toggleClass("inactive");
        // $("nav div a").replaceClass("active", "inactive");  
        $("nav a").removeClass("active");
        // document.write(curr);

    } else {
        // document.getElementById("#about").classList.add("active");
        // // $("#about").attr("class","active");
        // $(curr.insertAt(1,"#")).addClass("active");
        $('#' + curr.toString()).addClass("active");
        // $('#about').addClass("active");
    }
}

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

$("[type='radio']").click(function() {
    document.querySelectorAll('label > video').forEach(vid => vid.pause()); // pauses all videos
    document.querySelectorAll('label > video').forEach(vid => vid.removeAttribute("controls"));
    
    var radId = $("[type='radio']:checked").attr('id');
    var vid = document.querySelector("[for='"+radId+"'] video");
    vid.currentTime = '0';
    vid.play();
    vid.setAttribute("controls","");
});