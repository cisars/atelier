
<div class="modal fade" id="modal-danger{{$confirmation['value']}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Eliminar registro  </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route($confirmation['ruta'] , 'elimina' )}}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>¿Esta seguro que desea eliminar el registro {{$confirmation['value']}}?</p>
                    <input
                        type    ="hidden"
                        id      ="{{$confirmation['pk']}}"
                        name    ="{{$confirmation['pk']}}"
                        value   ="{{$confirmation['value']}}"
                    >
                </div>
                <div class="modal-footer justify-content-between">
                    <button
                        class   ="btn btn-danger"
                        type    ="submit">
                        <i class="fas fa-trash-alt" aria-hidden="true"></i> Eliminar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

