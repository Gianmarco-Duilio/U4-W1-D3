<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Form</title>
</head>

<body class="bg-dark text-white">
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <form action="Corso Epicode-Ifoa Back End\U4-W1-D3\aggiuntaCard.php" method="post" novalidate>
                    <label class="form-label" for="nome">nome</label><br>
                    <input type="text" name="nome" id="nome" placeholder="nome">
                    <br>
                    <br>
                    <label class="form-label" for="prezzo">prezzo</label><br>
                    <input type="number" name="prezzo" id="prezzo">
                    <br>
                    <br>
                    <div class="mb-3">
                        <label for="basic-url" class="form-label">URL immagine</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4" name="immagine">
                        </div>
                    </div>

                    <br>
                    <br>
                    <button class='btn btn-primary'>Send</button>


                </form>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>