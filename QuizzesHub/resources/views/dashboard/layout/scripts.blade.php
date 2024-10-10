<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
<script src="{{ asset('dashboard/assets') }}/js/jquery.min.js"></script>
    <script src="{{ asset('dashboard/assets') }}/js/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{ asset('dashboard/assets') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('dashboard/assets') }}/js/main.js"></script>
    <script src="{{ asset('dashboard/assets') }}/js/dashboard.js"></script>
    <script src="{{ asset('dashboard/assets') }}/js/widgets.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>
<script>
    document.addEventListener('keydown', function(event) {
      if (event.shiftKey && event.key === '~') {
        window.location.href = '/';
      }
    });
</script>
    @yield('scripts')
