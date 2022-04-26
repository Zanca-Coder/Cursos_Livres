<!-- Jumbotron -->
<div id="intro" class="py-2 text-center">
	<h1 class="mb-0 h3"><?= $this->title ?></h1>
</div>
<!-- Jumbotron -->
</header>
<!--Main Navigation-->

<!--Main layout-->

<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalLable">Professores</h5>
				<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<main class="mt-4 mb-5">
					<div class="container">
						<div class="border p-4 col-md-12">
							<form name="frmCadProfessor" id="frmCadProfessor">
								<div class="row">
									<div class="form-outline mb-4 col-md-6">
										<input type="text" id="user" name="user" class="form-control" required />
										<label class="form-label" for="user">Usuário</label>
									</div>

									<div class="form-outline mb-4 col-md-6">
										<input type="text" id="curLiv" name="curLiv" class="form-control" required />
										<label class="form-label" for="curLiv">Curso Livre</label>
									</div>

									<div class="form-outline mb-4 col-md-6">
										<input type="text" id="nomeProf" name="nomeProf" class="form-control" required />
										<label class="form-label" for="nomeProf">Nome Completo</label>
									</div>

									<div class="form-outline mb-4 col-md-6">
										<input type="text" id="txtCriado" name="txtCriado" class="form-control" required />
										<label class="form-label" for="txtCriado">Criado</label>
									</div>

								</div>

								<div>
									<div id="botaocad">
										<button type="button" class="btn btn-primary mb-4" id="btnInc">
											Incluir
										</button>
									</div>

									<div id="botoesedit">
										<button type="button" id="btnSave" name="btnSave" class="btn btn-primary">
											Gravar
										</button>

										<button type="button" name="btnCancel" id="btnCancel" class="btn btn-primary">
											Cancelar
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
			</div>
		</div>
	</div>
	<br>
</div>

<div>
	<table class="table table-hover" id="tabres" style="margin-left: 10px;">
		<thead>
			<tr>
				<th>Usuário</th>
				<th>Curso Livre</th>
				<th>Nome Completo</th>
				<th>Criado</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody id="lsprofessor">
		</tbody>
	</table>
</div>

<button type="button" class="btn btn-primary mb-4" id="btnShModal" style="margin-left: 10px;">
	Adicionar Novo
</button>

</main>
<!--Main layout-->