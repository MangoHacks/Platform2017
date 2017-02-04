window.sr = ScrollReveal();

if (document.body.scrollTop > 360) {
    sr.reveal('.mangoReveal', { delay: 0, duration: 1200 }, 400);
}
else {
    sr.reveal('.mangoReveal', { delay: 5200, duration: 1200 }, 400);
}

sr.reveal('.generalReveal', { duration: 1600 }, 50);

function select(s) {
    return document.querySelector(s);
}
function selectAll(s) {
    return document.querySelectorAll(s);
}

function convertToDueTone(color1, color2) {
    var value = [];
    value = value.concat(
        [color1[0]/256 - color2[0]/256, 0, 0, 0, color2[0]/256]
    );
    value = value.concat(
        [color1[1]/256 - color2[1]/256, 0, 0, 0, color2[1]/256]
    );
    value = value.concat(
        [color1[2]/256 - color2[2]/256, 0, 0, 0, color2[2]/256]
    );
    value = value.concat([0, 0, 0, 1, 0]);

    return value;

}

// light to dark
var colMatrix0 = convertToDueTone([180,180,180], [0,0,0])
var colMatrix = convertToDueTone(secondaryColor, primaryColor); //pink-blue

// var target = document.getElementById('duoToneMatrix');
// var target;
var props = { a00:colMatrix0[0], a04:colMatrix0[4],
    a10:colMatrix0[5], a14:colMatrix0[9],
    a20:colMatrix0[10], a24:colMatrix0[14],}; //current values

var new_props = { a00:colMatrix[0], a04:colMatrix[4],
    a10:colMatrix[5], a14:colMatrix[9],
    a20:colMatrix[10], a24:colMatrix[14],}; // newvalues


function applyProps() {
    target.setAttribute("values", "" + props.a00 + ", 0, 0, 0, " + props.a04 + ", " + props.a10 + ", 0, 0, 0, " + props.a14 + ", " + props.a20 + ", 0, 0, 0, " + props.a24 + ", 0, 0, 0, 1, 0");

}

function getFeValuesFromProps(props) {
    return " " + props.a00 + ", 0, 0, 0, " + props.a04 + ", " + props.a10 + ", 0, 0, 0, " + props.a14 + ", " + props.a20 + ", 0, 0, 0, " + props.a24 + ", 0, 0, 0, 1, 0";
}

var target = select('#duoToneMatrix');
var l_body = select('#logo__body');
var leaf = select('#logo__leaf');
var line = select('#logo__line');
var dot = select('#logo__dot');
var splatLineGroup = selectAll('#splatLineGroup line');
var m_drawable = [l_body, leaf, line, splatLineGroup];

var circle_1 = select('.hero__circle.circle__1');
var circle_2 = select('.hero__circle.circle__2');
var circle_3 = select('.hero__circle.circle__3');

TweenMax.set(m_drawable, {
    drawSVG:'0% 0%',
});
TweenMax.set(dot, {
    opacity: 0
});
TweenLite.set(props, {
    a00:colMatrix0[0], a04:colMatrix0[4],
    a10:colMatrix0[5], a14:colMatrix0[9],
    a20:colMatrix0[10], a24:colMatrix0[14],
    onStart:applyProps
});

TweenMax.set([circle_1, circle_2, circle_3], {
    css: {
        scale: 0
    }
});

function animateLogo() {
    var logo_tl = new TimelineMax();

    logo_tl.set(l_body, {
            drawSVG: '100% 100%'
        })
        .to(props, 2, {
            ease: Power1.easeIn,
            a00:colMatrix[0], a04:colMatrix[4],
            a10:colMatrix[5], a14:colMatrix[9],
            a20:colMatrix[10], a24:colMatrix[14],
            onUpdate:applyProps
        })
        .to(circle_1, .5, {
            css: {scale: 1},
            // e0ase: Power1.easeIn
            ease: Elastic.easeOut.config(1, 0.5), y: -500
        })
        .to(circle_2, .5, {
            css: {scale: 1},
            // ease: Power1.easeIn
            ease: Elastic.easeOut.config(1, 0.5), y: -500
        })
        .to(circle_3, .5, {
            css: {scale: 1},
            // ease: Power1.easeIn
            ease: Elastic.easeOut.config(1, 0.5), y: -500
        })
        .to(l_body, .9, {
            drawSVG:'0% 100%',
            ease:Power1.easeIn

        })
        .to(leaf, .5, {
            drawSVG:'0% 100%',
            ease:Power1.easeIn

        })
        .to(line, .4, {
            drawSVG:'0% 100%',
            ease:Power1.easeIn

        })
        .to(splatLineGroup, 0.3, {
            drawSVG:'40% 70%',
            ease:Linear.easeNone

        })
        .to(dot, 0, {
            opacity: 1
        })
        .to(splatLineGroup, 0.2, {
            drawSVG:'100% 100%',
            ease:Linear.easeNone
        })

}


$(window).on('load', function() {
    $('.hero').css('opacity', 1);
    animateLogo()
});

