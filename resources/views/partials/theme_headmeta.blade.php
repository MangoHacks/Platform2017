<style type="text/css">
    .mangoReveal { visibility: hidden; }
    .generalReveal { visibility: hidden; }

    /* Theme colors */
    .global-hero-bg {
        background-color: rgb({{ $colors['hero-fill'][0] }});
    }
    .global-hero-color {
        color: rgb({{ $colors['hero-color'][0] }}) !important;
    }
    .global-mango-color {
        color: rgb({{ $colors['mango-color'][0] }}) !important;
    }
    .global-accent-bg {
        background-color: rgb({{ $colors['accent-color'][0] }});
    }
    .global-accent-bg:hover {
        background-color: rgba({{ $colors['accent-color'][0] }}, .8);
    }
    .global-accent-color { color: rgb({{ $colors['accent-color'][0] }}) !important; }
    .global-primary-color { color: rgb({{ $colors['primary-color'][0] }}) !important; }
    .global-primary-bg { background-color: rgb({{ $colors['primary-color'][0] }}) !important; }
    .global-secondary-color { color: rgb({{ $colors['secondary-color'][0] }}) !important; }
    .global-secondary-bg { background-color: rgb({{ $colors['secondary-color'][0] }}) !important; }
    .global-base-gradient {
        background: linear-gradient(180deg,
        rgb({{ $colors['primary-color'][0] }}) 0,
        rgb({{ $colors['secondary-color'][0] }}) 80%);
    }
    .global-primary-gradient {
        background: rgb({{ $colors['primary-color'][0] }});
        background: linear-gradient(180deg,
        rgb({{ $colors['primary-color'][0] }}) 0,
        hsla(0,0%,100%,0) 50%);
    }
    .global-secondary-gradient {
        background: rgb({{ $colors['secondary-color'][0] }});
        background: linear-gradient(180deg,
        rgb({{ $colors['secondary-color'][0] }}) 0,
        hsla(0,0%,100%,0) 50%);
    }
    a {
        color: rgb({{ $colors['accent-color'][0] }});
        text-decoration: underline;
    }

    /* Circles */

    .hero__circle.circle__1 {
        top: {{$hero['pts']["big"]["top"]}};
        left:{{$hero['pts']["big"]["left"]}};
        right:{{$hero['pts']["big"]["right"]}};
        bottom: {{$hero['pts']["big"]["bottom"]}};
    }
    .hero__circle.circle__2 {
        top: {{$hero['pts']["med"]["top"]}};
        left:{{$hero['pts']["med"]["left"]}};
        right:{{$hero['pts']["med"]["right"]}};
        bottom: {{$hero['pts']["med"]["bottom"]}};
    }
    .hero__circle.circle__3 {
        top: {{$hero['pts']["small"]["top"]}};
        left:{{$hero['pts']["small"]["left"]}};
        right:{{$hero['pts']["small"]["right"]}};
        bottom: {{$hero['pts']["small"]["bottom"]}};
    }
</style>
<script>
    var primaryColor = [
        {{ $colors['primary-color'][1][0] }},
        {{ $colors['primary-color'][1][1] }},
        {{ $colors['primary-color'][1][2] }},
    ];
    var secondaryColor = [
        {{ $colors['secondary-color'][1][0] }},
        {{ $colors['secondary-color'][1][1] }},
        {{ $colors['secondary-color'][1][2] }},
    ];
</script>