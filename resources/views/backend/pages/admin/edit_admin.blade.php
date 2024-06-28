@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Admin</h6>
                        <form id="myForm" class="forms-sample" method="POST" action="{{ route('update.admin', $user->id) }}">
                            @csrf
                            <div class="mb-3 form-group">
                                <label for="exampleInputUsername1" class="form-label">Admin User Name</label>
                                <input type="text" name="username" class="form-control" autocomplete="off"
                                value="{{ $user->username }}">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="exampleInputUsername1" class="form-label">Admin Name</label>
                                <input type="text" name="name" class="form-control" autocomplete="off"
                                value="{{ $user->name }}">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="exampleInputUsername1" class="form-label">Admin Email</label>
                                <input type="email" name="email" class="form-control" autocomplete="off"
                                value="{{ $user->email }}">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="exampleInputUsername1" class="form-label">Admin Phone</label>
                                <input type="text" name="phone" class="form-control" autocomplete="off"
                                value="{{ $user->phone }}">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="exampleInputUsername1" class="form-label">Admin Address</label>
                                <input type="text" name="address" class="form-control" autocomplete="off"
                                value="{{ $user->address }}">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="exampleInputUsername1" class="form-label">Role Name</label>
                                <select name="roles" class="form-select" id="">
                                    <option selected="" disable="">Select Role</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : ''}}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection