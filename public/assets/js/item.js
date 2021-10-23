$(document).ready(function () {
    $('form').on('submit', function (e) {
        if (!valid) {
            e.preventDefault();
        }
    });

    function salvar() {
        console.log();
        return
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: 'Tem certeza?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, salve isso!',
            cancelButtonText: 'Não, cancele!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                var formData = new FormData($("form[name='salvar']")[0]);
                $.ajax({
                    url: "../gerencia/salvar",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data == 'true') {
                            swalWithBootstrapButtons.fire({
                                title: 'Atualizado!'
                            }).then((result) => {
                                window.location = "<?= base_url('/gerencia/view_get') ?>"
                            })
                        } else {
                            swalWithBootstrapButtons.fire(
                                'Não cadastrado',
                                'Erro ao cadastrar item.',
                                'error'
                            )
                        }
                    },
                    error: function (error) {
                        swalWithBootstrapButtons.fire(
                            'Não cadastrado',
                            'Erro ao cadastrar item.',
                            'error'
                        )
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    'Cancelado',
                    ':('
                )
            }
        })
    }

    function alterar() {

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
            confirmButtonText: 'Sim, salve isso!',
            cancelButtonText: 'Não, cancele!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                var formData = new FormData($("form[name='salvar']")[0]);
                $.ajax({
                    url: "salvar",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data == 'true') {
                            swalWithBootstrapButtons.fire({
                                title: 'Cadastrado!'
                            }).then((result) => {
                                window.location = "<?= base_url('gerencia/view_get') ?>"
                            })
                        } else {
                            swalWithBootstrapButtons.fire(
                                'Não cadastrado',
                                'Erro ao cadastrar item.',
                                'error'
                            )
                        }
                    },
                    error: function (error) {
                        swalWithBootstrapButtons.fire(
                            'Não cadastrado',
                            'Erro ao cadastrar item.',
                            'error'
                        )
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    'Cancelado',
                    ':('
                )
            }
        })
    }

});
