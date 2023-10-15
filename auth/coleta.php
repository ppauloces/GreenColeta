<?php 
$dados = $coletas->listaColeta($get);
$situacao = $coletas->situacao($dados['situacao']);

$data = explode(" ", $dados['data']);
$data = date('d/m/Y', strtotime($data[0]));

$tags = $coletas->tags($get);
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

					<p><?= $situacao['txt'] ?></p>
					<p>Data: <?= $data ?></p>

				</div>
			</div>
		</div>
		<div class="col 2">

		</div>
		<div class="col 12 m6">
			<div class="row">
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


				<div class="row">
					<button style="background-color: #f44336 " class="btn waves-effect waves-light" type="submit">EXCLUIR
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

