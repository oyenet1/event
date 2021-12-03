<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="fixed p-0 inset-0 w-screen  min-h-screen bg-cover bg-center" style="background-image: url('/img/event3.jpg')">
  <div class="w-full fixed top-0 h-screen bg-pink-600 m-0 bg-opacity-50">
    <div class="flex w-full justify-between items-center my-4 max-w-7xl mx-auto">
      <a href="/" class="text-smtext-2xl lg:text-3xl text-white dark:text-gray-500  font-semibold">Uniabuja Eventer Center</a>
      <div class="space-x-4">
        <a href="/verify" class="hover:bg-green-800 transition duration-1000 hover:text-white text-sm  dark:text-gray-500 font-semibold px-12 py-2 border-2 border-pink-600 text-white rounded-full">Verify Ticket</a>
        <a href="{{ route('login') }}" class="hover:bg-white hover:text-green-800 transition duration-1000  text-sm  dark:text-gray-500 font-semibold px-12 bg-pink-600 border-pink-600 text-white py-2 border-2 rounded-full">Log in</a>
      </div>
    </div>
    {{-- another one --}}
    <div class="flex flex-col justify-center h-screen space-y-8">
      <h1 class="text-white text-3xl text-center capitalize font-bold">Check active events <a href="/events" class="text-blue-600">Here</a></h1>
      <div class="w-full max-w-7xl mx-auto grid lg:grid-cols-3 gap-4 lg:gap-12">
        <div class="w-full rounded-xl shadow-md hover:shadow-2xl transition duration-500 hover:scale-105 bg-white overflow-hidden">
          <img src="/img/event1.jpg" alt="" class="w-full block">
          <p class="p-3 text-gray-500 text-lg">A new music event</p>
        </div>
        <div class="w-full rounded-xl shadow-md hover:shadow-2xl transition duration-500 hover:scale-105 bg-white overflow-hidden">
          <img src="/img/event1.jpg" alt="" class="w-full block">
          <p class="p-3 text-gray-500 text-lg">A new music event</p>
        </div>
        <div class="w-full rounded-xl shadow-md hover:shadow-2xl transition duration-500 hover:scale-105 bg-white overflow-hidden">
          <img src="/img/event1.jpg" alt="" class="w-full block">
          <p class="p-3 text-gray-500 text-lg">A new music event</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
