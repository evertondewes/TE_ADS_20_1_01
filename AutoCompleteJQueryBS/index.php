<html>
<head>

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
          crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha384-ZvpUoO/+PpLXR1lu4jmpXWu80pZlYUAfxl5NsBMWOEPSjUn/6Z/hRTt8+pR6L4N2"
            crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"></script>


</head>
<body>
<div class="container">
    <h1 class="page-header"> Seleção de Países</h1>
    <div class="table-responsive">
        <form method="post" action="index.php">
            <div class="form-group">
                <label>País</label>
                <input type="text" name="pais" id="pais"
                       class="form-control" autocomplete="off"/>
                <div id="lista_paises" class="position-absolute"></div>
                <input type="text" readonly name="codigo" id="codigo"
                       class="form-control">
                <button class="btn btn-info">Enviar</button>
            </div>

        </form>

    </div>
</div>
<script type="text/javascript">

    $(document).ready(function () {

        $('#pais').on('keyup', function () {
            var consulta = $(this).val();
            //console.log(consulta);

            $.ajax({
                url: "dados.php",
                type: "GET",
                dataType: "json",
                data: {
                    'strFiltro': consulta
                },
                success: function (dados) {

                    var saida;

                    if (Array.isArray(dados)) {

                        saida = '<ul class="dropdown-menu list-group" style="display: block; position: relative; z-index: 1">';
                        dados.forEach(function (pais) {
                            saida += '<li class="dropdown-item list-group-item paises"  id="' + pais.codigo + '"  ' +
                                ' data-codigo="' + pais.codigo + '"  >' + pais.nome + '</li>';
                        });

                        saida += '</ul>';
                    } else {
                        saida = '<li class="dropdown-item list-group-item">Sem resultado</li>';
                    }
                    $('#lista_paises').html(saida);
                }
            });

        });

        $(document).on('click', "[class*='paises']", function () {
            var nome = $(this).text();
            var id = $(this).attr('id');
            var codigo = $(this).data('codigo');

            $('#pais').val(nome);
            $('#codigo').val(codigo);
            $('#lista_paises').html('');
        });

        $('#pais').find('[autocomplete="off"]').val('');

    });

</script>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $pais = filter_input(INPUT_POST, 'pais', FILTER_SANITIZE_STRING);
    $codigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_STRING);
    if (strlen($pais) > 0 && strlen($codigo) > 0) {
        echo "<h1 class='page-header align-content-center'> $codigo - $pais </h1>";
    }
}

?>
</body>
</html>

