<div class="container">


    <div class="row">
        <div class="col s12 m6">
            <div class="card-panel light-green darken-1">
                <span class="white-text valign-wrapper center-align">Clique no ícone&nbsp<i class="material-icons">gps_fixed</i>&nbsppara pegar sua localização atual.
                </span>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="card-panel light-green darken-1" id="tutorial" style="cursor:pointer">
                <span class="white-text">Como reciclar de forma correta? Clique aqui
                </span>
            </div>
        </div>
    </div>


    <div class="col s12" style="margin-top: 20px;">
        <div id='map' style='width: 100%; height: 300px;'></div>
    </div>

    <div class="fixed-action-btn toolbar">
        <a class="btn-floating btn-large light-green darken-1 modal-trigger" href="#modal1">
            <i class="large material-icons">recycling</i>
        </a>

    </div>

    <!-- modal para registro de reciclagem -->
    <div id="modal1" class="modal bottom-sheet">
        <form class="" method="POST" id="novaColeta" enctype="multipart/form-data">
            <div class="modal-content">
                <h4>Nova reciclagem</h4>

                <div class="row container">

                    <div class="row">
                        <div class="input-field col s12">
                            <p>
                                Selecione o(s) material(ais): 
                                <label style="padding-left: 15px">
                                    <input type="checkbox" name="tipo[]" value="papel" />
                                    <span>Papel</span>
                                </label>
                                <label style="padding-left: 10px">
                                    <input type="checkbox" name="tipo[]" value="plastico" />
                                    <span>Plástico</span>
                                </label>
                                <label style="padding-left: 10px">
                                    <input type="checkbox" name="tipo[]" value="metal" />
                                    <span>Metal</span>
                                </label>
                                <label style="padding-left: 10px">
                                    <input type="checkbox" name="tipo[]" value="vidro" />
                                    <span>Vidro</span>
                                </label>
                                <label style="padding-left: 10px">
                                    <input type="checkbox" name="tipo[]" value="ferro" />
                                    <span>Ferro</span>
                                </label>
                                <label style="padding-left: 10px">
                                    <input type="checkbox" name="tipo[]" value="papelao" />
                                    <span>Papelão</span>
                                </label>
                                <label style="padding-left: 10px">
                                    <input type="checkbox" name="tipo[]" value="eletronicos" />
                                    <span>Eletroeletrônicos</span>
                                </label>
                            </p>
                        </div>
                        <div class="input-field col s12">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>imagem</span>
                                    <input type="file" name="imagemColeta" multiple >
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Adicione uma foto do material preparado pra coleta">
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <h5>Endereço para coleta</h5>
                    <div class="row">
                        <div class="input-field col s12">
                            <p>
                                <label style="padding-left: 15px; color: black;">
                                    <input type="checkbox" id="usarEnderecoAtualCheckbox" name="enderecoAtual" value="true" />
                                    <span>Usar seu endereço atual</span>
                                </label>
                            </p>
                        </div>
                    </div>
                    <div id="endereco">
                        <div class="row">
                            <div class="input-field col s4">
                                <input id="cep" type="text" name="cep" class="validate cep">
                                <label for="cep">CEP</label>
                            </div>
                            <div class="input-field col s8">
                                <input id="rua" type="text" name="endereco" class="validate">
                                <label for="rua">Endereço</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="cidade" type="text" name="cidade" class="validate">
                                <label for="cidade">Cidade</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="bairro" type="text" name="bairro" class="validate">
                                <label for="bairro">Bairro</label>
                            </div>
                            <div class="input-field col s3">
                                <input id="uf" type="text" name="estado" class="validate">
                                <label for="uf">Estado</label>
                            </div>
                            <div class="input-field col s3">
                                <input id="numero" type="text" name="numero" class="validate">
                                <label for="numero">Número</label>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button style="background-color: #538D22" id="btnNovaColeta" class="btn waves-effect waves-light" type="submit">
                    ADICIONAR COLETA
                </button>
            </div>
        </form>
    </div>

    <!-- modal para tutorial de reciclagem -->
    <div id="modaltutorial" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Como reciclar de forma correta?</h4>
            <p>Essa modal terá tutoriais com imagens e explicações de como reciclar de forma correta</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Entendi</a>
        </div>
    </div>
    <hr>
    <h4>Últimos registros de coleta</h4>
    <?php
    $fetch = $coletas->coletasRecentes($user['id']);

    foreach($fetch as $col)
    {
        $situacao = $coletas->situacao($col['situacao']);
        ?>
        <ul class="collection">
            <li class="collection-item avatar">
                <i class="material-icons circle blue">local_shipping</i>
                <span class="title">Solicitação de coleta - <?= $situacao['txt'] ?></span>
                <p><?= $col['rua'] ?>, <?= $col['bairro'] ?>, <?= $col['numero'] ?> - <?= $col['cidade'] ?>, <?= $col['estado'] ?><br>
                    <a href="coleta/<?= $col['id'] ?>">Clique para obter as informações completas da coleta</a>
                </p>
                <a style="cursor:pointer;" class="secondary-content tooltipped" data-position="top" data-tooltip="<?= $situacao['txt'] ?>" style="margin-right: 25px;"><i class="material-icons <?= $situacao['color'] ?>-text float-right"><?= $situacao['icon'] ?></i></a>
            </li>
        </ul>
    <?php } ?>
</div>