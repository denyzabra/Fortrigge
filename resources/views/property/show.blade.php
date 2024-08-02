<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('induction', __('anaesthetics.induction')) }}
                {{ Form::select('induction[]', $anaesthesia_inductions, '', ['class' => 'form-control compulsory exclude_required', 'id' => 'induction', 'multiple' => 'true']) }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('muscle_relaxant', __('anaesthetics.muscle_relaxants')) }}
                {{ Form::select('muscle_relaxant', $muscle_relaxants, 0, ['class' => 'form-control', 'data-error' => '', 'id' => 'muscle_relaxant']) }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('volatile_liquid_anaethetics', __('anaesthetics.volatile_liquid_anaethetics')) }}
                {{ Form::select('volatile_liquid_anaethetics', $volatile_liquid_anaethetics, 1, ['class' => 'form-control', 'data-error' => '', 'id' => 'volatile_liquid_anaethetics']) }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('agent_used', __('anaesthetics.agent_used')) }}
                {{ Form::select('agent_used[]', $anaesthetic_agents, '', ['class' => 'form-control', 'id' => 'agent_used_1', 'multiple' => 'true']) }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('technique', __('anaesthetics.technique')) }}
                {{ Form::select('technique[]', $anaesthetic_techniques, '', ['class' => 'form-control', 'data-error' => '', 'id' => 'technique', 'multiple' => 'true']) }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('needle_type', __('anaesthetics.type_of_needle_used')) }}
                {{ Form::select('needle_type', $needle_types, '', ['class' => 'form-control', 'data-error' => '', 'id' => 'needle_type']) }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('volume_administered', __('anaesthetics.volume_administered (mls)')) }}
                {{ Form::number('volume_administered', '', ['class' => 'form-control compulsory', 'step' => '0.1', 'id' => 'volume_administered']) }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('blood_given', __('anaesthetics.blood_given (mls)')) }}
                {{ Form::number('blood_given', 0, ['class' => 'form-control compulsory', 'step' => '0.1', 'id' => 'blood_given']) }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('antibiotics', __('anaesthetics.antibiotics')) }}
                <div id="selected_antibiotics">
                    {{ Form::select('antibiotics[]', $anti_biotics, 0, ['class' => 'form-control compulsory', 'required', 'data-error' => '', 'style' => 'width: 85%; display: inline-block']) }}
                    <a class="add_antibiotics label-info label" style="float: right; color: white"><small>Add <sup>+</sup></small></a><br>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('airway', __('anaesthetics.airway')) }}
                {{ Form::select('airway', $airways, '', ['class' => 'form-control compulsory', 'required', 'data-error' => '', 'id' => 'airway']) }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('analgesic', __('anaesthetics.analgesics')) }}
                {{ Form::select('analgesic[]', $analgesics, 0, ['class' => 'form-control', 'id' => 'analgesic', 'multiple' => 'true']) }}
                <a href="#modal_new_analgesic" data-toggle="modal" id="new_analgesic_modal"><small>add new</small></a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('ett', 'ETT (mm)') }}
                {{ Form::select('ett', $anaesthesia_etts, '', ['class' => 'form-control', 'data-error' => '', 'id' => 'ett']) }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <fieldset class="field">
                <legend>{{ __('anaesthetics.iv_fluids_given_during_surgery') }}</legend>
                <div class="row">
                    <div class="col-sm-2">
                        <a class="add_iv_fluid_button label-info label pull-right" style="font-size: smaller; color: white">Add<sup>+</sup></a>
                    </div>
                    <div class="col-sm-10">
                        <div class="input_fields_wrap">
                            <div class="separator bottom row">
                                <table id="iv_fluids_table" class="table table-borderless table-condensed" style="display: none;">
                                    <tr>
                                        <th>Name</th>
                                        <th>Units</th>
                                    </tr>
                                    @foreach($iv_fluid_ids as $k => $v)
                                        <tr>
                                            <td>{{ get_name($v, "id", "name", "iv_fluids") }}</td>
                                            <td>{{ $iv_fluid_units[$k] }} mls</td>
                                        </tr>
                                    @endforeach
                                </table>
                                {{ Form::select('iv_fluid_id[]', $iv_fluids, 0, ['class' => 'form-control col-sm-7']) }} &nbsp;
                                <input type="number" name="iv_fluid_units[]" id="iv_fluid_units" class="form-control col-sm-3" value="0">(mls)<br>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>

    <div id="general_div2" style="display: none;">
        <div id="exclude-in-general-iv">
            <div class="form-group">
                {{ Form::label('volatile_liquid_anaesthetic_used', __('anaesthetics.volatile_liquid_anaesthetic_used')) }}
                {{ Form::number('volatile_liquid_anaesthetic_used', '0', ['class' => 'form-control compulsory', 'step' => '0.1', 'id' => 'volatile_liquid_anaesthetic_used']) }}
            </div>
            <div id="tank_div" class="alert alert-info" style="display: none;">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ __('anaesthetics.approximate_equivalents') }}
                <table class="table-condensed table-borderless">
                    <tr>
                        <td>1 Tank = 150mls</td>
                        <td>3/4 = 110mls</td>
                    </tr>
                    <tr>
                        <td>1/2 = 75mls</td>
                        <td>1/4 = 40mls</td>
                        <td>1/6 = 25mls</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
