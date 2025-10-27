<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minimal Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .nav-item.active {
            background-color: #f3f4f6;
            border-right: 3px solid #3b82f6;
        }
    </style>
</head>
<body class="bg-gray-50">
    {{ $slot }}
</body>
</html>