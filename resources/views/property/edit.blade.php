@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="info-group">
                        <div class="form-group">
                            <label for="type" class="form-label">{{ __('Type') }}</label>
                            <select name="type" class="form-control hidesearch">
                                <?php foreach($types as $key => $value): ?>
                                    <option value="<?= $key ?>"><?= $value ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Enter Property Name') }}">
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">{{ __('Description') }}</label>
                            <textarea name="description" class="form-control" rows="8" placeholder="{{ __('Enter Property Description') }}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="thumbnail" class="form-label">{{ __('Thumbnail Image') }}</label>
                            <input type="file" name="thumbnail" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="info-group">
                        <div class="form-group">
                            <label for="country" class="form-label">{{ __('Country') }}</label>
                            <input type="text" name="country" class="form-control" placeholder="{{ __('Enter Property Country') }}">
                        </div>
                        <div class="form-group">
                            <label for="state" class="form-label">{{ __('State') }}</label>
                            <input type="text" name="state" class="form-control" placeholder="{{ __('Enter Property State') }}">
                        </div>
                        <div class="form-group">
                            <label for="city" class="form-label">{{ __('City') }}</label>
                            <input type="text" name="city" class="form-control" placeholder="{{ __('Enter Property City') }}">
                        </div>
                        <div class="form-group">
                            <label for="zip_code" class="form-label">{{ __('Zip Code') }}</label>
                            <input type="text" name="zip_code" class="form-control" placeholder="{{ __('Enter Property Zip Code') }}">
                        </div>
                        <div class="form-group">
                            <label for="address" class="form-label">{{ __('Address') }}</label>
                            <textarea name="address" class="form-control" rows="3" placeholder="{{ __('Enter Property Address') }}"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <label for="demo-upload" class="form-label">{{ __('Property Images') }}</label>
                </div>
                <div class="card-body">
                    <div class="dropzone needsclick" id="demo-upload" action="#">
                        <div class="dz-message needsclick">
                            <div class="upload-icon"><i class="fa fa-cloud-upload"></i></div>
                            <h3>{{ __('Drop files here or click to upload.') }}</h3>
                        </div>
                    </div>
                    <div class="preview-dropzon" style="display: none;">
                        <div class="dz-preview dz-file-preview">
                            <div class="dz-image"><img data-dz-thumbnail src="" alt=""></div>
                            <div class="dz-details">
                                <div class="dz-size"><span data-dz-size></span></div>
                                <div class="dz-filename"><span data-dz-name></span></div>
                            </div>
                            <div class="dz-progress">
                                <span class="dz-upload" data-dz-uploadprogress></span>
                            </div>
                            <div class="dz-success-mark"><i class="fa fa-check" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="group-button text-end">
                <button type="submit" class="btn btn-primary btn-rounded" id="property-submit">{{ __('Create') }}</button>
            </div>
        </div>
    </div>
   @endsection
