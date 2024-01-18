<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'myself') }}</title>
        
        <script src="https://js.stripe.com/v3/"></script>        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400;1,500&display=swap"
        rel="stylesheet"
        />
        <link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap" 
        rel="stylesheet">
        <!-- Fonts -->
        
        <!-- Google icons # start -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <!-- Google icons # end -->

        <!-- Google maps start-->
        <script
        async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzutbgFidPQIG0Gkaqx8DmiwiB0pUFyeE&libraries=places&callback=console.debug"></script>
        <!-- Google maps end -->

        <!-- Google Search Console start-->
        <meta name="google-site-verification" content="erV447H5voAvs1MTiQCgETMlHpVvA0mDRIUCSh79tjI" />
        <!-- Google Search Console end -->
  
 
        <!-- Google Adsense start-->
        <div id="divadsensedisplaynone" style="display:none;">
            <!-- put here all adsense code -->
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-xxxxxx"
                data-ad-slot="xxxxxx"
                data-ad-format="auto"
                data-full-width-responsive="true"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            </div>
        <!-- Google Adsense end -->



        

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-DJ32Y8NV9M"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-DJ32Y8NV9M');
        </script>

        <!-- Favicon start -->
        <link
        rel="icon"
        type="image/svg+xml"
        href="/favicon.svg"
        color="000000"
      />


 
      <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
      <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
      <link rel="manifest" href="/site.webmanifest">
      <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#000000">
      <meta name="msapplication-TileColor" content="#da532c">
      <meta name="theme-color" content="#ffffff">
        <!-- Favicon end -->

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead

    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
