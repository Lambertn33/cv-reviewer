<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  @vite('resources/js/app.js')
  @inertiaHead
</head>

<style>
  body {
    font-family: 'Poppins', sans-serif;
  }
</style>

<body class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-300">
  @routes
  @inertia
</body>

</html>