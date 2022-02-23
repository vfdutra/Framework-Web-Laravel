<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="navbar-nav">
            <a href="/home" class="nav-item nav-link"> Home </a>
            <a href="/medicos" class="nav-item nav-link"> Médicos </a>
            <a href="/pacientes" class="nav-item nav-link"> Pacientes </a>
            <a href="/consulta" class="nav-item nav-link"> Consultas </a>
            <a href="/relatorios/listamedicosconsultas" class="nav-item nav-link"> Relatórios Médicos</a>
            <a href="/relatorios/listapacientesconsultas" class="nav-item nav-link"> Relatórios Pacientes</a>
        </div>
    </nav>
    <div class="container">
        <div class="title m-d-md">
            <h1> @yield('titulo') </h1>
        </div>
        <section>
            @yield('conteudo')
        </section>
    </div>
</body>

</html>