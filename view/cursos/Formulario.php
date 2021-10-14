<?php include __DIR__ . "/../Header.php"; ?>
    <a href="/listar-cursos" class="btn btn-primary mb-2">Voltar</a> 
    <form method="POST" action="/salvar-curso">
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao">
        </div>
        <button class="btn btn-primary">Enviar</button>
    </form>
<?php include __DIR__ . "/../Footer.php"; ?>
