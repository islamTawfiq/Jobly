@if (auth()->user()->user_type_id != 2 && auth()->user()->user_type_id != 5 && $nanny->status == 0 )
<a href="JavaScript:void(0);" data-toggle="modal" data-target="#bookNanny"
class="btn btn-primary {{ $class }}">Book / Request Interview</a>
@endif
@if ( $nanny->status != 0 && $nanny->status != 3 )
<a href="JavaScript:void(0);" style="cursor: unset"
class="btn btn-primary {{ $reserved }}">Reserved</a>
@endif
@if ( $nanny->status == 3 )
<a href="JavaScript:void(0);" style="cursor: unset; background: #28a745 !important; color: #fff !important; border-color: #28a745 !important"
class="btn btn-primary {{ $reserved }}">Hired</a>
@endif
