<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Список стран с добавлением</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel='stylesheet'>
    </head>
<body>
    <div class='row'>
        <form class='col s12' method='post'>
            <div class="input-field">
              <input placeholder="Введите название новой страны" id="name" name='name' type="text" class="validate">
              <label for="name">Добавить</label>
            </div>
        </form>
    </div>
    <ul class="collection with-header" id='country-list'>
        <li class="collection-header"><h4>Список стран</h4></li>
    </ul>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script type="text/javascript">const error = '<?= $error ?? '' ?>' </script>
    <script src='public/app.js'></script>
</body>
</html>