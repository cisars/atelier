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
<div class="alert alert-{{$type}}  alert-dismissible fade show" role="alert" id="modals-alerts">
    <i class="fa {{ $icon }}"> </i> {{$msg}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
