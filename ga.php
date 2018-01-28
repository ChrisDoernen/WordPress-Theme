    <script>
        var gaProperty = 'UA-XXXXXXX-X';
        var disableStr = 'ga-disable-' + gaProperty;
        if (document.cookie.indexOf(disableStr + '=true') > -1) {
          window[disableStr] = true;
        }
        function gaOptout() {
          document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
          window[disableStr] = true;
        }
    </script>
    
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109227890-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'GA_TRACKING_ID', { 'anonymize_ip': true });
        gtag('config', 'UA-109227890-1');
    </script>