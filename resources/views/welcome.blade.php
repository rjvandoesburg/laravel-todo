<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Shopping list</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
    </head>
    <body>
       <div id="app">
           <section class="hero is-primary">
               <div class="hero-body">
                   <div class="container">
                       <h1 class="title">
                           ShoppingList.io
                       </h1>
                       <h2 class="subtitle">
                           Never forget anything in the store again!
                       </h2>
                   </div>
               </div>
           </section>
           <section class="section">
               <div class="container">
                   <item-list></item-list>
               </div>
           </section>
           <notification></notification>
       </div>
    </body>
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</html>
