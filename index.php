<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO SatellaSoft</title>

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
        <h1>Nossos clientes</h1>
        <hr>

        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="edit.php?id=" class="btn btn-warning">Editar</a>
                        <a href="actions/delete.php?id=" class="btn btn-danger" onclick="return confirm('Deseja realmente remover esse cliente?');">Remover</a>
                    </td>
                </tr>
            </tbody>
        </table>

    </section>

    <footer>
        <div>
            <p>Conteúdo produzido por: <a href="https://academy.satellasoft.com">Academy SatellaSoft</a>.</p>
        </div>
    </footer>

</body>

</html>