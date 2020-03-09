<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <label for="{{$name}}">{{$label}}</label>
                <input type="file" id="{{$name}}" name="{{$name}}" class="dropify" accept="{{$accept}}"
                       data-max-file-size="{{$max}}M" data-default-file="{{$value}}"
                       @if (isset($required) && $required == true)
                      required
                    @endif
                       @if (isset($disabled) && $disabled == true)
                       disabled readonly="readonly"
                    @endif
                />
            </div>
        </div>
    </div>
</div>
