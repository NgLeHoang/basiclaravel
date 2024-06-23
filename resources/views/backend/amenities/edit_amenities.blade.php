@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Amenities Type</h6>
                        <form class="forms-sample" method="POST" action="{{ route('update.amenities') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $amenities->id }}">
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Amenities Name</label>
                                <input type="text" name="amenities_name" class="form-control" autocomplete="off"
                                value="{{ $amenities->amenities_name }}">
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