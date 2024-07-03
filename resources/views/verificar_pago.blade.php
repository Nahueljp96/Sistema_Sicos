
<!DOCTYPE html>
<html>
<head>
    <title>Verificar Pago</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
        .result-container {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Verificar Pago del Alumno</h1>
        <form action="/verificar-pago" method="GET" class="form-inline justify-content-center">
            <div class="form-group mx-sm-3 mb-2">
                <label for="dni" class="sr-only">DNI del Alumno</label>
                <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese DNI" required>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Verificar</button>
        </form>

        @if (isset($error))
            <div class="alert alert-danger mt-3">{{ $error }}</div>
        @endif

        @if (isset($result))
            <div class="result-container">
                <h2 class="text-center">Resultado:</h2>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $result['alumno']->nombre }} {{ $result['alumno']->apellido }}</h5>
                        <ul class="list-group list-group-flush">
                            @foreach ($result['altas'] as $alta)
                                <li class="list-group-item">
                                    Curso: {{ $alta['curso'] }} - Pago al día: 
                                    <span class="badge badge-{{ $alta['pago_al_dia'] == 'Sí' ? 'success' : 'danger' }}">
                                        {{ $alta['pago_al_dia'] }}
                                    </span>
                                    - Caducada: 
                                    <span class="badge badge-{{ $alta['caducada'] == 'Sí' ? 'danger' : 'success' }}">
                                        {{ $alta['caducada'] }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>