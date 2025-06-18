<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Produtos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('produtos.index') }}">Produtos</a>
            <a class="nav-link text-white" href="{{ route('categorias.index') }}">Categorias</a>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
