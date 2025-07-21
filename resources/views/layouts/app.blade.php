@php use Illuminate\Support\Facades\Session; @endphp




<!doctype html>

<html lang="{{app()->getLocale()}}">

<head>
    <meta charset="UTF-8">
    <title>{{__('messages.title')}}</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Document</title>
</head>
<body class="bg-gray-100 text-gray-800">
<div>Aktiális nyelv : <?= app()->getLocale()?></div>
<header class="bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold">{{ __('messages.title') }}</h1>
    <div>
        <a href="{{ route('lang.switch', 'en') }}" class="px-2 text-blue-500">EN</a> |
        <a href="{{ route('lang.switch', 'hu') }}" class="px-2 text-blue-500">HU</a>
    </div>
</header>

<main class="p-6">
    @yield('content')
</main>

</body>
</html>
