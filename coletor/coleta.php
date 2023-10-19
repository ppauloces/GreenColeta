<?php 
require_once 'config/auth.php';
$get = $_GET['id'];
$dados = $coletas->listaColeta($get);
$situacao = $coletas->situacao($dados['situacao']);

$data = explode(" ", $dados['data']);
$data = date('d/m/Y', strtotime($data[0]));

$tags = $coletas->tags($get);
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>GreenColeta | Situar coleta</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>

<body>

	<?php
	include 'layouts/app.php';
	?>

	<div class="container">
		<div class="row" style="margin-top: 20px;">
			<div class="col 12 m4 ">
				<div class="card">
					<div class="card-image">
						<img class="materialboxed" width="450" src="<?= GET_IMAGEM .'/'. $dados['imagem'] ?>">
					</div>
					<div class="card-content">
						<h5 class="valign-wrapper left-align">
							<b>Situação</b>
						</h5>

						<p class="<?= $situacao['color'] ?>-text"><?= $situacao['txt'] ?></p>
						<p>Data: <?= $data ?></p>

					</div>
				</div>
				<a href="./" style="background-color: #43a047" class="btn waves-effect waves-light" type="submit">
					<i class="material-icons left">keyboard_backspace</i>
					VOLTAR
				</a>

			</div>
			<div class="col 2">

			</div>
			<div class="col 12 m6">
				<div class="row">
					<h5>Localização</h5>
					<div class="row">
						<div class="input-field col s12">
							<input id="cidade_coleta" type="text" disabled value="<?= $dados['cidade'] ?>" class="validate valid">
							<label for="cidade_coleta" class="active">Cidade</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<input id="rua_coleta" value="<?= $dados['rua'] ?>" class="validate valid" disabled>
							<label for="rua_coleta" class="active">Rua</label>
						</div>
						<div class="input-field col s6">
							<input id="bairro_coleta" type="text" value="<?= $dados['bairro'] ?>" class="validate valid" disabled>
							<label for="bairro_coleta" class="active">Bairro</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<input id="cep_coleta" type="text" name="cep" value="<?= $dados['cep'] ?>" class="validate cep valid" disabled>
							<label for="cep_coleta" class="active">CEP</label>
						</div>
						<div class="input-field col s3">
							<input id="uf_coleta" type="text" name="estado" value="<?= $dados['estado'] ?>" class="validate valid" disabled>
							<label for="uf_coleta" class="active">Estado</label>
						</div>
						<div class="input-field col s3">
							<input id="" type="text" name="numero" value="<?= $dados['numero'] ?>" class="validate valid" disabled>
							<label for="numero" class="active">Número</label>
						</div>
					</div>
					<div class="row">
						<div class="col s12">
							<p for="numero" class="active">Materiais</p>
							<?php 	
							foreach ($tags as $coluna => $valor) {
								if ($valor === 'S') {
									?>
									<div class="chip">
										<?= ucfirst($coluna) ?>
									</div>
									<?php 
								}
							}
							?>

						</div>
					</div>

					<?php 
					if($dados['situacao'] == '0'){
						?>
						<div class="row" id="buttons">
							<div class="col s6 m6 l3">
								<form method="POST" id="formAceita">
									<input type="hidden" name="id_coleta" value="<?= $get ?>">
									<button style="background-color: #43a047 " class="btn waves-effect waves-light" type="submit">
										ACEITAR
									</button>
								</form>
							</div>
							<div class="col s6 m6 l3">
								<button id="recusar" style="background-color: #f44336 " class="btn waves-effect waves-light">RECUSAR
								</button>
							</div>
						</div>

						<div class="row" id="divTextarea" style="display: none;">

							<div class="row">

								<form id="formRecusa" method="POST">
									<div class="input-field col s12">
										<i class="material-icons prefix">mode_edit</i>
										<textarea id="textoRecusa" name="motivo_recusa" class="materialize-textarea" required></textarea>
										<label for="textoRecusa">Adicione o motivo da recusa <label style="color:red">*</label></label>
										<input type="hidden" name="id_coleta" value="<?= $get ?>">
									</div>
									<button style="background-color: #43a047 " id="submitRecusa" class="btn waves-effect waves-light">ENVIAR
									</button>
								</form>
							</div>
						</div>
					<?php }elseif($dados['situacao'] == 2){ ?>
						<label for="textoRecusa">Motivo da recusa</label>
						<textarea id="textoRecusa" class="materialize-textarea" disabled><?= $dados['observacao'] ?></textarea>

						<?php 
					}elseif($dados['situacao'] == 1){ 
						$usuario = $coletas->listarUsuarioColeta($dados['id_user']);
						$telefone = $usuario['telefone'];
						$telefone = str_replace(array('(', ')', '-', ' '), '', $telefone);
						?>
						<p style="color: #43a047;"><b>Coleta aceita!</b></p>
						<p>Se atente, pois agora é sua obrigação entrar em contato com o usuário para realizar a coleta!</p>
						<p>Mande uma mensagem para o usuário <?= mb_strtoupper($usuario['nome']) ?> <a target="_blank" href="https://wa.me//55<?=$telefone?>?text=Ola!%20Somos da empresa <?= $coletor['nome'] ?>.%20Vamos%20realizar%20sua%20coleta?">clicando aqui!</a></p>
						
						<hr>
						<p>Se atente! Quando a coleta for finalizada, clique no botão abaixo para marcar a coleta como finalizada!</p>
						<a style="background-color: #43a047 " class="btn waves-effect waves-light modal-trigger" href="#finalizarColeta">
							FINALIZAR
						</a>
						<div id="finalizarColeta" class="modal modal-small ">
							<div class="modal-content">
								<h4>FINALIZAR COLETA</h4>
								<p>Adicione alguma observação relacionado a coleta realizada</p>
								<div class="row">
									<form class="col s12" id="finalColeta" method="POST">
										<div class="row">

											<div class="input-field col s12">
												<textarea id="textarea1" class="materialize-textarea" name="obs_coletor"></textarea>
												<input type="hidden" name="id_coleta" value="<?= $get ?>">
												<label for="textarea1">Observação</label>
											</div>
											<div class="input-field col s12">
												<button style="background-color: #43a047 " id="submitRecusa" class="btn waves-effect waves-light">ENVIAR E FINALIZAR
												</button>
											</div>
										</div>
									</form>
								</div>

							</div>

						</div>
					<?php }elseif($dados['situacao'] == 4){ ?>
						<p style="color: #43a047;"><b>Materiais coletados com sucesso!</b></p>
						<p>Nós da GreenColeta ficamos muito felizes de vocês estarem utilizando nosso sistema! Não só nos, mas o planeta também agradece 🥰</p>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>




	<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function() {
			$('.sidenav').sidenav();
			$(".dropdown-trigger").dropdown();
			$('.materialboxed').materialbox();
			$('select').formSelect();
			$('.modal').modal();
			$('.tooltipped').tooltip();
		});
	</script>

	<script>
		    // Esconda a div com o textarea por padrão
		$("#divTextarea").fadeOut();

    // Adicione um manipulador de evento ao botão "RECUSAR"
		$("#recusar").click(function() {
        // Esconda a div com a classe "row"
			$("#buttons").fadeOut();
        // Exiba a div com o textarea
			$("#divTextarea").show();
		});

		$(document).ready(function() {
    //ajax para editar dados do usuario
			$("#formRecusa").submit(function(event) {
				event.preventDefault();
				var formData = $(this).serialize();
				$.ajax({
					url: 'crud/recusarColeta.php',
					type: 'POST',
					data: formData,
					dataType: 'json',
					success: function(data) {
						console.log(data);
						if (data.status === 'success') {
							M.toast({
								html: '<i class="material-icons">check</i>&nbsp' + data.mensagem,
								classes: 'light-green darken-2'
							});
						} else if (data.status === 'error') {
							M.toast({
								html: '<i class="material-icons">error</i>&nbsp' + data.mensagem,
								classes: 'lime darken-4'
							});
						}
					},
					error: function(xhr, status, error) {
                // Manipule erros de comunicação com o servidor aqui
						console.error(xhr);
						console.error(status);
						console.error(error);
						M.toast({
							html: '<i class="material-icons">error</i>&nbspErro de comunicação com o servidor',
							classes: 'red darken-2'
						});
					}
				});
			});


		});

		$(document).ready(function() {
    //ajax para editar dados do usuario
			$("#formAceita").submit(function(event) {
				event.preventDefault();
				var formData = $(this).serialize();
				$.ajax({
					url: 'crud/aceitarColeta.php',
					type: 'POST',
					data: formData,
					dataType: 'json',
					success: function(data) {
						console.log(data);
						if (data.status === 'success') {
							M.toast({
								html: '<i class="material-icons">check</i>&nbsp' + data.mensagem,
								classes: 'light-green darken-2'
							});
							setTimeout(function() {
								window.location.reload();
							}, 1300); // 2000 milissegundos (2 segundos)

						} else if (data.status === 'error') {
							M.toast({
								html: '<i class="material-icons">error</i>&nbsp' + data.mensagem,
								classes: 'lime darken-4'
							});
						}
					},
					error: function(xhr, status, error) {
                // Manipule erros de comunicação com o servidor aqui
						console.error(xhr);
						console.error(status);
						console.error(error);
						M.toast({
							html: '<i class="material-icons">error</i>&nbspErro de comunicação com o servidor',
							classes: 'red darken-2'
						});
					}
				});
			});


		});

		$(document).ready(function() {
    //ajax para editar dados do usuario
			$("#finalColeta").submit(function(event) {
				event.preventDefault();
				var formData = $(this).serialize();
				$.ajax({
					url: 'crud/finalizarColeta.php',
					type: 'POST',
					data: formData,
					dataType: 'json',
					success: function(data) {
						console.log(data);
						if (data.status === 'success') {
							M.toast({
								html: '<i class="material-icons">check</i>&nbsp' + data.mensagem,
								classes: 'light-green darken-2'
							});
							setTimeout(function() {
								window.location.reload();
							}, 1300); // 2000 milissegundos (2 segundos)

						} else if (data.status === 'error') {
							M.toast({
								html: '<i class="material-icons">error</i>&nbsp' + data.mensagem,
								classes: 'lime darken-4'
							});
						}
					},
					error: function(xhr, status, error) {
                // Manipule erros de comunicação com o servidor aqui
						console.error(xhr);
						console.error(status);
						console.error(error);
						M.toast({
							html: '<i class="material-icons">error</i>&nbspErro de comunicação com o servidor',
							classes: 'red darken-2'
						});
					}
				});
			});


		});
	</script>

</body>
