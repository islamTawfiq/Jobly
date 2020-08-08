<fieldset class="form-label-group mb-1 mt-2">
    <label for="{{$id}}">
        <span class="star">*</span> {{$label}}
    </label>
    <textarea name="{{ $name }}" id="{{ $id }}" data-length="90" maxlength="{{ $maxlength }}" class="form-control char-textarea {{$class}}"  id="textarea-counter" rows="3"
              @if (isset($disabled) && $disabled == true)
              disabled readonly="readonly"
              @endif
              placeholder="{{$placeholder}}">{{isset($value) && $value != '' ? $value  : old($name)}}</textarea>
</fieldset>
