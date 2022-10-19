{{ BsForm::resource('requests')->get(url()->current()) }}

<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <label>Service</label>
                <select name="service" class="form-control">
                    <option value="">Select Service</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" value="{{ request()->date }}" class="form-control">
                </div>
            </div>
            {{-- <div class="col-md-3">
                <div class="form-group">
                    <label>Start At</label>
                    <input type="date" name="start" value="{{ request()->start }}" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>End At</label>
                    <input type="date" name="end" value="{{ request()->end }}" class="form-control">
                </div>
            </div> --}}
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary mt-2">
                    <i class="fas fa fa-fw fa-filter"></i>
                    Filter
                </button>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>

{{ BsForm::close() }}
