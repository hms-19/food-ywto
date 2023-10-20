<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>403 Forbidden</title>
    <link rel="stylesheet" href="/403.css">
</head>
<body>
    <div>
        <h1>403 Forbidden</h1>
        <p>
            If you are not an admin,you can't login.Please login at
            <a href="/login" class="my-link">User Login</a>
        </p>
    </div>
</body>
</html>