{{ BsForm::resource('requests')->get(url()->current()) }}

<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <select name="service" class="form-control">
                    <option value="">Select Service</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa fa-fw fa-filter"></i>
                    Filter
                </button>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>

{{ BsForm::close() }}
