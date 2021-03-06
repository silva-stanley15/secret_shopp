<!doctype html>
<!-- doctype informa ao agente de usuario a versão do html que deve ser renderizada-->
<html lang="pt-br">
<head>
    <title> Secret Shop </title>
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <script src="../assets/js/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/assets/css/estilo.css">
    <?php if (isset($body) && trim($body) != '') { ?>
        <link rel="stylesheet" href="/assets/js/<?= $body ?>.js">
    <?php } ?>
</head>
<body>
<div id="principal">
    <header class="header-topo">
        <div class="logotipo">
            <a href="<?= base_url('home') ?>"> <img src="/assets/imagens/logo.jpeg" alt="Logo Secret shop" width="120px"> </a>
        </div>
        <nav class="header-nav">
            <ul>
                <li>
                    <a href="<?= base_url('gerencia') ?>">Itens</a>
                    <a href="<?= base_url('home/about') ?>">Sobre</a>
                    <?php // aqui validação admin
                    if (true) { ?>
                        <a href="<?= base_url('gerencia') ?>">Gerenciar</a>
                    <?php } ?>
                    <a href="#">Criar conta</a>
                    <a href="<?= base_url('login') ?>" class="login">Login</a>
                </li>
            </ul>
        </nav>
    </header>