<?php include __DIR__ . "/../Header.php";?>
    <form action="/realizar-login" method="post">
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <button class="btn btn-primary">enviar</button>
    </form>
<?php include __DIR__ . "/../Footer.php";?>