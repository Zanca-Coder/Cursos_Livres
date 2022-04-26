<!-- Jumbotron -->
<div id="intro" class="py-2 text-center">
	<h1 class="mb-0 h3"><?= $this->title ?></h1>
</div>
<!-- Jumbotron -->
</header>
<!--Main Navigation-->

<div class="modal fade" id="formModalClass" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalLableClass">Classes de Curso</h5>
				<button type="button" id="btnClose" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<main class="mt-4 mb-5">
					<div class="container">
						<div class="border p-4 col-md-12">
							<form name="frmCadClass" id="frmCadClass">

								<div class="row" style="margin-left: 2%;">
									<div class="form-outline col-md-2 mb-4">
										<input type="text" id="txtAno" name="txtAno" class="form-control" required />
										<label class="form-label" for="txtAno">Ano</label>
									</div>

									<div class="form-outline col-md-2 mb-4" style="margin-left: 2%;">
										<input type="text" id="txtSem" name="txtSem" class="form-control" required />
										<label class="form-label" for="txtSem">Semestre</label>
									</div>

									<div class="form-outline col-md-6 mb-4" style="margin-left: 2%;">
										<input type="text" id="txtDesc" name="txtDesc" class="form-control" required />
										<label class="form-label" for="txtDesc">Descrição</label>
									</div>
								</div>


								<div class="row" style="margin-left: 2%;">
									<div class="form-outline col-md-2 mb-4">
										<input type="text" id="txtTerm" name="txtTerm" class="form-control" required />
										<label class="form-label" for="txtTerm">Termo</label>
									</div>

									<div class="form-outline col-md-2 mb-4" style="margin-left: 2%;">
										<input type="text" id="txtTurma" name="txtTurma" class="form-control" required />
										<label class="form-label" for="txtTurma">Turma</label>
									</div>

									<div class="form-outline col-md-4 mb-4" style="margin-left: 2%;">
										<input type="text" id="txtIdPai" name="txtIdPai" class="form-control" required />
										<label class="form-label" for="txtIdPai">Id Categoria Pai Moodle</label>
									</div>

								</div>


								<div class="row" style="margin-left: 1%;">

									<div class="mb-4 col-md-5">
										<select class="form-select" name="selCodTipCurso" id="selCodTipCurso">
											<option value="" selected disabled>Selecione o Tipo de Curso</option>
											<option value="1">Graduação</option>
											<option value="4">Pós Graduação</option>
										</select>
									</div>

									<div class="mb-4 col-md-4">
										<select class="form-select" name="selCodCurso" id="selCodCurso">
										</select>
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
						<br>
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
				<th>Ano</th>
				<th>Semestre</th>
				<th>Descrição</th>
				<th>Termo</th>
				<th>Turma</th>
				<th>Id Categoria Pai</th>
				<th>Código do Curso</th>
				<th>Código do Tipo de Curso</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody id="lsclasse">
		</tbody>
	</table>
</div>

<button type="button" class="btn btn-primary mb-4" id="btnShModalClass" style="margin-left: 10px;">
	Adicionar Novo
</button>

</main>
<!--Main layout-->