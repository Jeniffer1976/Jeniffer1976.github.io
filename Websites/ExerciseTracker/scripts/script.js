$(document).ready(function () {
    $('#fullpage').fullpage({ //initialize //set options 
        navigation: false,
        navigationPosition: 'right',
        anchors: ['section1', 'section2', 'section3', 'section4'],

        afterLoad: function (origin, destination, direction) {
            if (destination.index == 0) {
                p1RunIn.play();

            } else if (destination.index == 1) {
                $('.myNav').addClass('navSolid')
                    .removeClass('navGrad');



            } else if (destination.index == 2) {
                $('.myNav').addClass('navGrad')
                    .removeClass('navSolid');

                p3jog.play();
                p3cloud.play();
            }
            else if (destination.index == 3) {
                $('.myNav').addClass('navGrad')
                    .removeClass('navSolid');
            }


            if (destination.index == 0) {
                $('.myNav').hide();
            }
            else {
                $('.myNav').show();

            }
            // let cycAttr = $('.cyc button').attr()


            // $('#fp-nav ul li:last-child').css("display", "none");


            fullpage_api.setAllowScrolling(false);
        }


    });

    $("#jogBtn").mouseover(function () {
        p3jog.play();
        p3cloud.play();
    });
    $("#jogBtn").mouseleave(function () {
        p3jog.pause();
        p3cloud.pause();

    });
    $("#submit").click(function () {
        var name = $("#name").val();

        $("#nameDisplay").html(
            "Hello " + name + "!"
        )
        p1RunOut.play()
        setTimeout(function () {

            fullpage_api.moveSectionDown();
            // fullpage_api.silentMoveTo('section2');
        }, 1600);

    });

    $(".userBtn").click(function () {
        fullpage_api.silentMoveTo('section1');

    });

    function progressEntry(currLvl, nxtLvl, chartId, req, legend) {
        // progressChart.destroy();
        var entries = $(currLvl + " .progressEntry");
        var sum = 0;
        var entryObj = new Object();
        // $('#fp-nav ul li:last-child').css("display","none");

        for (var i = 0; i < entries.length; i++) {
            var day = "Day " + (i + 1);
            var entry = parseInt($(entries[i]).val());
            entryObj[day] = entry;

            sum += entry;

        }
        if (sum < req) {
            $(currLvl + " .tryAgain").removeClass('hideBtn');
        }
        else if (sum >= req) {
            $(nxtLvl).removeAttr('disabled');
            $(currLvl + " .nextLvl").removeClass('hideBtn');
            // $('#fp-nav ul li:last-child').css("display", "none");
        }

        if (isNaN(sum)) {
            $(currLvl + " .alert").css("display", "block")
        }
        else {

            $(currLvl + " .progressBtnVisiblity").addClass('hideBtn');
            $(currLvl + " .entryBoard").addClass('hide');
            $(currLvl + " .progressChart").removeClass('hide');

            const ctx = document.getElementById(chartId);

            const progressChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: Object.keys(entryObj),
                    datasets: [
                        {
                            label: legend,
                            data: Object.values(entryObj),

                        },
                    ],
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            // maintainAspectRatio: false
                        }

                    }

                },
            });
            // }
            $(currLvl + " .tryAgain").click(function () {
                $(currLvl + " .tryAgain").addClass('hideBtn');
                $(currLvl + " .progressBtnVisiblity").removeClass('hideBtn');
                $(currLvl + " .entryBoard").removeClass('hide');
                $(currLvl + " .progressChart").addClass('hide');
                progressChart.destroy();

                for (var i = 0; i < entries.length; i++) {
                    entries[i].value = "";
                }
            });
        }

    }

    $(".jogLvl #progressEnter").click(function () {
        progressEntry('.jogLvl', '.cycleCard', 'jogChart', 12, 'Kilometers Jogged');
    });

    $(".cycLvl #progressEnter").click(function () {
        progressEntry('.cycLvl', '.swimCard', 'cycChart', 22, 'Kilometers Cycled');
    });



});


tippy('#infoTippy', {
    content: 'Exercise Tracker is an online app that helps users keep track of their weekly exercise regime.',
    placement: 'top',
    theme: 'material',

});



var p1RunIn =
    anime.timeline({
        autoplay: false,
    });

p1RunIn
    .add({
        targets: '#man',
        translateX: [-1500, 0],
        direction: 'normal',
        easing: 'easeInOutQuad',
        duration: 1800
    }, 10)
    .add({
        targets: '#tracker',
        translateY: [-190, 0],
        direction: 'normal',
        easing: 'easeOutBounce',
        duration: 800
    })

var p1RunOut =
    anime({
        targets: '#man,#tracker',
        translateX: [0, 1900],
        // translateY: [0, 0],
        direction: 'normal',
        easing: 'easeInOutQuad',
        duration: 1800,
        autoplay: false,
    });


var p3jog =
    anime.timeline({
        loop: true,
        direction: 'alternate',
        easing: 'easeInOutQuad',
        autoplay: false,
    });


p3jog
    .add({
        targets: '#jogGirl',
        translateY: 15,
        duration: 500,
    }, 0)
    .add({
        targets: '#jogMan',
        translateY: 15,
        duration: 400,
        // delay: 1
    }, 0);

var p3cloud =
    anime.timeline({
        loop: true,
        direction: 'normal',
        easing: 'easeInQuad',
        autoplay: false,

    });
p3cloud
    .add({
        targets: '#cloud1',
        translateX: -500,
        translateY: 5,
        duration: 10000,
    }, 0)
    .add({
        targets: '#cloud2',
        translateX: -500,
        translateY: -5,
        duration: 9000,
    }, 0);


