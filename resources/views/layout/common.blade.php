<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>@yield('title') | {{config('const.domain')}}</title>
</head>
<body>
@yield('header')
@yield('content')
@yield('footer')
</body>
</html>