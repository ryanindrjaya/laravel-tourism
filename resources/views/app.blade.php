<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/f540826c4d.js" crossorigin="anonymous"></script>
  <link href="{{ asset('../css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('../css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('../css/vendors.css') }}" rel="stylesheet">

  <!-- CUSTOM CSS -->
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
  @viteReactRefresh
  @vite('resources/js/app.jsx')
  @vite('resources/css/app.css')
  @inertiaHead
</head>

<body>

  @inertia

</body>

</html>
