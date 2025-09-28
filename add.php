<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar novo cliente - PDO SatellaSoft</title>

    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">PDO SatellaSoft</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="add.php">Novo cliente</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <section class="max-width center mt-5">
        <h1>Adicionar novo cliente</h1>
        <hr>

        <form action="actions/add.php" method="post">
            <div class="mb-3">
                <label for="txtNome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="txtNome" name="txtNome">
            </div>
            <div class="mb-3">
                <label for="txtEmail" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="txtEmail" name="txtEmail">
            </div>

            <button type="submit" class="btn btn-success">Cadastrar</button>
        </form>
    </section>

    <footer>
        <div>
            <p>Conteúdo produzido por: <a href="https://academy.satellasoft.com">Academy SatellaSoft</a>.</p>
        </div>
    </footer>
</body>

</html>