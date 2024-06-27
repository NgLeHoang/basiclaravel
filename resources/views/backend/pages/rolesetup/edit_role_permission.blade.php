@extends('admin.admin_dashboard')
@section('admin')

<style type="text/css">
    .form-check-label {
        text-transform: capitalize;
    }
</style>

<div class="page-content">
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Role in Permission</h6>
                        <form id="myForm" class="forms-sample" method="POST"
                            action="{{ route('admin.role.update', $role->id) }}">
                            @csrf
                            <div class="mb-3 form-group">
                                <label for="exampleInputUsername1" class="form-label">Role Name</label>
                                <h3>{{ $role->name }}</h3>
                                
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="checkDefaultMain">
                                <label class="form-check-label" for="checkDefaultMain">Permission All</label>
                            </div>
                            <hr>
                            @foreach($permission_groups as $group)
                            <div class="row">
                                <div class="col-3">
                                @php
                                    $permissions = App\Models\User::getPermissionByGroupName($group->group_name);
                                @endphp
                                    <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" id="checkDefault"
                                        {{ App\Models\User::roleHasPermission($role, $permissions) ? 'checked' : ''}}>
                                        <label class="form-check-label" for="checkDefault">
                                            {{ $group->group_name }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-9">
                                    @foreach($permissions as $permission)
                                    <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" name="permission[]" id="checkDefault{{ $permission->id }}"
                                        value="{{ $permission->name }}" {{$role->hasPermissionTo($permission->name) ? 'checked' : ''}}>
                                        <label class="form-check-label" for="checkDefault{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                    <br>
                                </div>
                            </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection