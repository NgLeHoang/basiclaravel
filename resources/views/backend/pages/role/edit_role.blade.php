@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Role</h6>
                        <form class="forms-sample" method="POST" action="{{ route('update.role') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $role->id }}">
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Role Name</label>
                                <input type="text" name="name" class="form-control" autocomplete="off"
                                value="{{ $role->name }}">
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