<div class="form-group row align-items-center" :class="{'has-danger': errors.has('avion_id'), 'has-success': fields.avion_id && fields.avion_id.valid }">
    <label for="avion_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.vol.columns.avion_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.avion_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('avion_id'), 'form-control-success': fields.avion_id && fields.avion_id.valid}" id="avion_id" name="avion_id" placeholder="{{ trans('admin.vol.columns.avion_id') }}">
        <div v-if="errors.has('avion_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('avion_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('date_depart'), 'has-success': fields.date_depart && fields.date_depart.valid }">
    <label for="date_depart" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.vol.columns.date_depart') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.date_depart" :config="datetimePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('date_depart'), 'form-control-success': fields.date_depart && fields.date_depart.valid}" id="date_depart" name="date_depart" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('date_depart')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('date_depart') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('lieu_arrivee_id'), 'has-success': fields.lieu_arrivee_id && fields.lieu_arrivee_id.valid }">
    <label for="lieu_arrivee_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.vol.columns.lieu_arrivee_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.lieu_arrivee_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('lieu_arrivee_id'), 'form-control-success': fields.lieu_arrivee_id && fields.lieu_arrivee_id.valid}" id="lieu_arrivee_id" name="lieu_arrivee_id" placeholder="{{ trans('admin.vol.columns.lieu_arrivee_id') }}">
        <div v-if="errors.has('lieu_arrivee_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('lieu_arrivee_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('lieu_depart_id'), 'has-success': fields.lieu_depart_id && fields.lieu_depart_id.valid }">
    <label for="lieu_depart_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.vol.columns.lieu_depart_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.lieu_depart_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('lieu_depart_id'), 'form-control-success': fields.lieu_depart_id && fields.lieu_depart_id.valid}" id="lieu_depart_id" name="lieu_depart_id" placeholder="{{ trans('admin.vol.columns.lieu_depart_id') }}">
        <div v-if="errors.has('lieu_depart_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('lieu_depart_id') }}</div>
    </div>
</div>


