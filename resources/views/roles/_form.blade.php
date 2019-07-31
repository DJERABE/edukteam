<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group @if ($errors->has('display_name')) has-danger @endif">
                    <label class="control-label">Nom*</label>
                    {!! Form::text('display_name', null, ['class' => "form-control @if ($errors->has('display_name')) form-control-danger @endif"]) !!}
                    @if ($errors->has('display_name')) <p class="form-control-feedback">{{ $errors->first('display_name') }}</p> @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::label('permissions*') !!}
            <div class="form-group row @if ($errors->has('permissions')) has-danger @endif">
                    @if(isset($role->permissions) && !empty($role->permissions))
                        @php
                            $perms_array = $permissions->chunk(4);
                            foreach($perms_array as $perms) {
                                echo '<div class="card" style="padding: 0.5rem; width: 18rem;">
                                    <ul class="list-group list-group-flush">';
                                        foreach($perms as $perm) {
                                            if($role->hasPermissionTo($perm->id)) {
                                                echo '
                                                <li class="list-group-item">
                                                    <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="permissions[]" value="'.$perm->name.'" class="custom-control-input" checked>
                                                    <span class="custom-control-label">'.$perm->name.'</span>
                                                    </label>
                                                </li>';
                                            }
                                            else {
                                                echo '
                                                <li class="list-group-item">
                                                    <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="permissions[]" value="'.$perm->name.'" class="custom-control-input">
                                                    <span class="custom-control-label">'.$perm->name.'</span>
                                                    </label>
                                                </li>';
                                            }
                                        }
                                    echo '</ul>
                                </div>';
                            }
                        @endphp
                    @else
                        @php
                            $perms_array = $permissions->chunk(4);
                            foreach($perms_array as $perms) {
                                echo '
                                <div class="card" style="padding: 0.5rem; width: 18rem;">
                                    <ul class="list-group list-group-flush">';
                                        foreach($perms as $perm) {
                                            echo '
                                                <li class="list-group-item">
                                                    <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="permissions[]" value="'.$perm->name.'" class="custom-control-input">
                                                    <span class="custom-control-label">'.$perm->name.'</span>
                                                    </label>
                                                </li>';
                                        }
                                    echo '</ul>
                                </div>';
                            }
                        @endphp
                    @endif
                @if ($errors->has('permissions')) <p class="form-control-feedback">{{ $errors->first('permissions') }}</p> @endif
            </div>
        </div>
    </div>
</div>