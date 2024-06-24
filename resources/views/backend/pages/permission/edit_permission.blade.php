@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Permission</h6>
                        <form class="forms-sample" method="POST" action="{{ route('update.permission') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $permission->id }}">
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Permission Name</label>
                                <input type="text" name="name" class="form-control" autocomplete="off"
                                value="{{ $permission->name }}">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="exampleInputUsername1" class="form-label">Group Name</label>
                                <select name="group_name" class="form-select" id="">
                                    <option selected="" disable="">Select Group</option>
                                    <option value="type" {{ $permission->group_name == 'type' ? 'selected' : ''}}>Property Type</option>
                                    <option value="amenities" {{ $permission->group_name == 'amenities' ? 'selected' : ''}}>Amenities</option>
                                    <option value="permission" {{ $permission->group_name == 'permission' ? 'selected' : ''}}>Role & Permission</option>
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