<p><?php echo $msg ?></p>

<div class="col-sm-12">
    <div style="padding: 2%;">
        <h2><?= $titulo ?></h2>
        <table class="table table-hover table-bordered ">
            <thead>
            <tr>
                <td>Nome </td>
                <td>Descricao </td>
                <td></td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            <?php if (count($itens) == 0) : ?>
                <td colspan="5">Nenhum item encontrado.</td>
            <?php endif; ?>
            <?php foreach ($itens as $item) : ?>
                <tr>
                    <td><?= $item->nome ?></td>
                    <td><?= $item->descricao ?></td>
                    <td><a href="<?= base_url('gerencia/view_update/' . $item->id_item) ?>" class="btn btn-outline-primary" role="button" aria-pressed="true">Editar</a></td>
                    <td><button onclick="excluir(this.value)" value="<?= $item->id_item ?>" class="btn btn-outline-danger" role="button">Excluir</button></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function excluir(id_item) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'Tem certeza?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, apague isso!',
            cancelButtonText: 'Não, cancele!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.post("deleteItem/" + id_item, function(data) {
                    if (data == 'true') {
                        swalWithBootstrapButtons.fire({
                            title: 'Apagado!'
                        }).then((result) => {
                            window.location = "<?= base_url('gerencia/view_get') ?>"
                        })

                    } else {
                        swalWithBootstrapButtons.fire({
                            title: 'Cancelado',
                            text: 'Erro ao excluir aluno.'
                        }).then((result) => {
                            window.location = "<?= base_url('gerencia/view_get') ?>"
                        })
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'Seu arquivo está seguro :)',
                    'error'
                )
            }
        })
    }
</script>
