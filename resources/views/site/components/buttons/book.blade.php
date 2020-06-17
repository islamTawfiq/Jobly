@if (auth()->user()->user_type_id != 2 && $nanny->status != 1 )
<a href="JavaScript:void(0);" data-toggle="modal" data-target="#bookNanny"
class="btn btn-primary {{ $class }}">Book / Request Interview</a>
@endif
@if ( $nanny->status == 1 )
<a href="JavaScript:void(0);" style="cursor: unset"
class="btn btn-primary {{ $reserved }}">Reserved</a>
@endif
