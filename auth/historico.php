<div class="container">
	<h2>Histórico de coletas</h2>
<?php
$fetch = $coletas->listaColetaPorUsuario($user['id']);

foreach($fetch['dados'] as $col)
{
    $situacao = $coletas->situacao($col['situacao']);
    $modalId = "modalRecusa_" . $col['id']; // Crie um ID único para o modal

    ?>
    <ul class="collection">
        <li class="collection-item avatar">
            <i class="material-icons circle blue">local_shipping</i>
            <span class="title">Solicitação de coleta - <?= $situacao['txt'] ?></span>
            <p><?= $col['rua'] ?>, <?= $col['bairro'] ?>, <?= $col['numero'] ?> - <?= $col['cidade'] ?>, <?= $col['estado'] ?><br>
                <a href="coleta/<?= $col['id'] ?>">Clique para obter as informações completas da coleta</a>
            </p>
            <?php 
            if($col['situacao'] == 2){
                ?>
                <a style="cursor: pointer;" class="modal-trigger secondary-content tooltipped" href="#<?= $modalId ?>" data-position="top" data-tooltip="VISUALIZAR OBSERVAÇÃO DE RECUSA" >
                  <i class="material-icons green-text float-right" style="font-size: 30px; margin-right: 32px;">visibility</i>
                </a>

                <div id="<?= $modalId ?>" class="modal modal-small">
                    <div class="modal-content">
                        <h4>MOTIVO DA RECUSA DE COLETA</h4>
                        <p><?= $col['observacao'] ?></p>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">ENTENDI!</a>
                    </div>
                </div>
            <?php } ?>

            <a style="cursor:pointer;" class="secondary-content tooltipped" data-position="top" data-tooltip="<?= $situacao['txt'] ?>" style="margin-right: 25px;">
                <i style="font-size: 28px;" class="material-icons <?= $situacao['color'] ?>-text float-right"><?= $situacao['icon'] ?></i>
            </a>
        </li>
    </ul>
<?php } ?>
</div>