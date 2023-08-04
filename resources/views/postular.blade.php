<!-- Modal -->
<!-- Modal -->
<div class="modal animated zoomIn" id="postular{{ $convocatoria->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Más Información</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="h7 small text-muted ml-3 justify-content-center text-center">{{ $convocatoria->titulo }}</div>

            <div class="modal-body">
                <div class="buttons-form-submit d-flex justify-content-center">
                    <div class="row ">
                        <div class="col-12 text-center">
                            <a href="convocatorias/{{ $convocatoria->base1 }}" class="btn btn-info btn-sm" target="blank">
                                <i class="fa fa-file-pdf"> Base</i>
                            </a>&nbsp;
                            <a href="" class="btn btn-success btn-sm">
                                <i class="fa fa-file-pdf"> Cronograma</i>
                            </a>
                            &nbsp;
                            <a href="" class="btn btn-warning btn-sm">
                                <i class="fa fa-file-pdf"> Anexos</i>
                            </a>&nbsp;
                            <a href="" class="btn btn-danger btn-sm">
                                <i class="fa fa-file-pdf"> Resultado</i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
