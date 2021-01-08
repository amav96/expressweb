<!-- Modal -->
<div class="modal fade" id="abrirParaImportarValidador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Importar para Validar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" action="../../control/adm/C_normalizacion.php">
          <div class="form-group">
            <input type="file" class="form-control-file" name="dataImportarParaValidar" id="dataImportarParaValidar">
          </div>

          <div class="form-group">
        <label for="">Fecha ingresado</label>
          <input type="date" class="form-control" name="fechaImportadoValidar" id="fechaImportadoValidar" required>
        </div>
        <div class="form-group">
        <label for="">Administrador</label>
          <input type="text" class="form-control" value="<?php echo $_SESSION["tipo"]["nombre"]; ?>" name="operadorValidar" id="operadorValidar" required readonly>
        </div>

        <div class="form-group">
        <label for="">Empresa</label>
          <select class="form-control" name="empresaValidar" id="empresaValidar" required> </select>
        </div>

        <div class="form-group">
        <label for="">Cartera</label>
          <input type="text" class="form-control" name="carteraValidar" id="carteraValidar" required>
        </div>



      </div>
      <div class="modal-footer">

        <button type="submit" name="botonImportarValidar" class="btn btn-primary">Importar</button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>


      </div>
    </div>
  </div>
</div>