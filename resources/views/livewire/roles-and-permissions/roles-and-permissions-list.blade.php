<div>
    <div class="row">
        @forelse($permissions as $permission)
        <div class="col-md-3">
            <div class="custom-control custom-checkbox">
                <input wire:change="changePermissionEvent($event.target.value)" type="checkbox" class="custom-control-input" id="{{$permission}}" name="permissions[]" value="{{$permission}}" @if(in_array($permission, $user_permissions)) checked @endif @if(in_array($permission, $user_permissions_vai_roles)) disabled @endif>
                <label class="custom-control-label @if(in_array($permission, $user_permissions_vai_roles)) font-weight-light @endif" for="{{$permission}}">{{$permission}}</label>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p>No Permissions</p>
        </div>
        @endforelse
    </div>
</div>