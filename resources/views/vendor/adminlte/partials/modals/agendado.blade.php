<div class="d-none">
    @switch($type)
        @case('success')
        {{ $icon = 'fa-check' }}
        @break
        @case('danger')
        {{ $icon = 'fa-exclamation' }}
        @break
        @case('info')
        {{ $icon = 'fa-info-circle' }}
        @break
    @endswitch
</div>
{{--<div class="alert alert-{{$type}}  alert-dismissible fade show" role="alert" id="modals-alerts">--}}
{{--    <i class="fa {{ $icon }}"> </i> {{$msg}}--}}
{{--    <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--        <span aria-hidden="true">&times;</span>--}}
{{--    </button>--}}
{{--</div>--}}
<div class="modal  " id="myModal"  >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header bg-maroon">
                <h4 class="modal-title">Agendamiento Solicitado!</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body text-center">
                <h4 class="text-maroon"> Su solicitud ah sido enviada! </h4>
                <br> Un representante se pondrá en contacto con Ud. para confirmar la solicitud.
                <br><br> Gracias por su preferencia!
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

{{--<div class="modal fade show " style="display: block" id="myModal"  >--}}
{{--    <div class="modal-dialog" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header bg-maroon">--}}
{{--                <h5 class="modal-title">Solicitud de Reserva via Online </h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="modal-body text-center">--}}



{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

