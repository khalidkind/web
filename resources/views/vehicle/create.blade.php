@extends('master.master')
@section('content')
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Add New Vehicle</h6>
                                <p class="text-sm mb-0">Fill the blank with the correct value</p>
                            </div>
                            <div class="ms-auto">
                                <a href="{{ route('location.index') }}" class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-1"></i> Go back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('vehicle.store') }}" id="addvehicle">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Vehicle Type (Choose One)</label>
                                        <div class="input-group">
                                            <select class="form-control" type="text" name="jenis" maxlength="10"
                                                placeholder="" required>
                                                <option value="motorcycle">Motorcycle</option>
                                                <option value="car">Car</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        {{-- @error('location_name')
                                        <div class="text-danger text-sm mt-1">{{ $message }}</div>
                                        @enderror --}}
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">First Hour Charges</label>
                                            <div class="input-group">
                                                <input class="form-control" type="number" name="perjam_pertama" min="0"
                                                    placeholder="" required>
                                            </div>
                                            {{-- @error('max_motorcycle')
                                            <div class="text-danger text-sm mt-1">{{ $message }}</div>
                                            @enderror --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Next Hourly Charges</label>
                                            <div class="input-group">
                                                <input class="form-control" type="number" name="perjam_berikutnya" min="0"
                                                    placeholder="" required>
                                            </div>
                                            {{-- @error('max_car')
                                            <div class="text-danger text-sm mt-1">{{ $message }}</div>
                                            @enderror --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Max Cost Per Day</label>
                                            <div class="input-group">
                                                <input class="form-control" type="number" name="max_perhari" min="0"
                                                    placeholder="" required>
                                            </div>
                                            {{-- @error('max_other')
                                            <div class="text-danger text-sm mt-1">{{ $message }}</div>
                                            @enderror --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-end gap-2">
                                            <button type="submit" class="btn btn-primary" id="submitBtn">
                                                <i class="fas fa-save me-1"></i> Save Data
                                            </button>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.getElementById('addvehicle').addEventListener('submit', function (e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Save Data?',
                        text: "Make sure your data is correct.",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#cc0c9f',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Save',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            e.target.submit();
                        }
                    });
                });

                @if($errors->any())
                    Swal.fire({
                        title: 'Validation Failed!',
                        html: '<ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });
                @endif

                @if(session('success'))
                    Swal.fire({
                        title: 'Success!',
                        text: '{{ session('success') }}',
                        icon: 'success',
                        timer: 3000,
                        showConfirmButton: false
                    });
                @endif
            </script>
        @endpush
    </div>
@endsection