<div class="mapouter">
    <div class="gmap_canvas">
        <iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q={{ $contact->latitude }},{{ $contact->longitude }}&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
        <a href="https://mcpenation.com/">MCPE Nation</a></div>
    <style>.mapouter {
            position: relative;
            text-align: right;
            width: 100%;
            height: 400px;
        }

        .gmap_canvas {
            overflow: hidden;
            background: none !important;
            width: 100%;
            height: 400px;
        }

        .gmap_iframe {
            width: 100% !important;
            height: 400px !important;
        }</style>
</div>