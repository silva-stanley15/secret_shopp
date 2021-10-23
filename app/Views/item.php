<strong><?php echo $msg ?></strong>
<div class="card border-secondary mb-3" style="margin: 2% auto;">
    <div style="padding: 2%; background-color: #e6e3e3;">
        <form  id="<?="form_$acao"?>" name="<?="form_$acao"?>" method="post" enctype="multipart/form-data">
            <h2><?= $titulo; ?></h2>
            <div class="form-group">
                <label>Nome:</label>
                <input required class="form-control" type="text" name="nome" id="nome" autocomplete="off"
                       value="<?php echo(isset($item) ? $item->nome : '') ?>">
            </div>
            <!--            <div class="form-group">-->
            <!--                <label>Descrição:</label>-->
            <!--                <input required class="form-control" type="text" name="descricao" id="descricao" autocomplete="off"-->
            <!--                       value="--><?php //echo(isset($item) ? $item->descricao : '') ?><!--">-->
            <!--            </div>-->
            <!--            <div class="form-group">-->
            <!--                <label>Preço:</label>-->
            <!--                <input required class="form-control" type="number" step="0.01" name="preco" id="preco" autocomplete="off"-->
            <!--                       value="--><?php //echo(isset($item) ? $item->preco : '') ?><!--">-->
            <!--            </div>-->
            <!--            <div class="form-group">-->
            <!--                <label>Força:</label>-->
            <!--                <input required class="form-control" type="number" step="0.01" name="forca" id="forca" autocomplete="off"-->
            <!--                       value="--><?php //echo(isset($item) ? $item->preco : '') ?><!--">-->
            <!--            </div>-->
            <!--            <div class="form-group">-->
            <!--                <label>Agilidade:</label>-->
            <!--                <input required class="form-control" type="number" step="0.01" name="agilidade" id="agilidade" autocomplete="off"-->
            <!--                       value="--><?php //echo(isset($item) ? $item->preco : '') ?><!--">-->
            <!--            </div>-->
            <!--            <div class="form-group">-->
            <!--                <label>Inteligência:</label>-->
            <!--                <input required class="form-control" type="number" step="0.01" name="inteligencia" id="inteligencia" autocomplete="off"-->
            <!--                       value="--><?php //echo(isset($item) ? $item->preco : '') ?><!--">-->
            <!--            </div>-->
            <!--            <div class="form-group">-->
            <!--                <label>Vida:</label>-->
            <!--                <input required class="form-control" type="number" name="vida" id="vida" autocomplete="off"-->
            <!--                       value="--><?php //echo(isset($item) ? $item->preco : '') ?><!--">-->
            <!--            </div>-->
            <!--            <div class="form-group">-->
            <!--                <label>Mana:</label>-->
            <!--                <input required class="form-control" type="number" name="mana" id="mana" autocomplete="off"-->
            <!--                       value="--><?php //echo(isset($item) ? $item->preco : '') ?><!--">-->
            <!--            </div>-->
            <!--            <div class="form-group">-->
            <!--                <label>Dano:</label>-->
            <!--                <input required class="form-control" type="number" name="dano" id="dano" autocomplete="off"-->
            <!--                       value="--><?php //echo(isset($item) ? $item->preco : '') ?><!--">-->
            <!--            </div>-->
            <!--            <div class="form-group">-->
            <!--                <label>Armadura:</label>-->
            <!--                <input required class="form-control" type="number" name="armadura" id="armadura" autocomplete="off"-->
            <!--                       value="--><?php //echo(isset($item) ? $item->preco : '') ?><!--">-->
            <!--            </div>-->
            <!--            <div class="form-group">-->
            <!--                <label>Velocidade de ataque:</label>-->
            <!--                <input required class="form-control" type="number" step="0.01" name="velocidadeDeAtq" id="velocidadeDeAtq" autocomplete="off"-->
            <!--                       value="--><?php //echo(isset($item) ? $item->preco : '') ?><!--">-->
            <!--            </div>-->
            <div class="form-group">
                <label>Imagem: </label>
                <input required class="form-control-file" type="file" name="imagem" id="imagem" accept="image/png, image/jpeg"
                       value="<?php echo(isset($item) ? $item->id_item : '') ?>"></p>
                <?php if (isset($item)) : ?>
                    <img class="preview-img" width="150" height="150" src="<?php echo base_url($item->id_item) ?>">
                <?php endif; ?>
            </div>
            <div class="form-group">
                <button onclick="<?=$acao?>()" class="btn btn-outline-success"> <?=$acao?> </button>
            </div>
        </form>
    </div>
</div>
