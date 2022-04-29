<div class="form-group row align-items-center" :class="{'has-danger': errors.has('age_max'), 'has-success': fields.age_max && fields.age_max.valid }">
    <label for="age_max" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.categorie-age.columns.age_max') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.age_max" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('age_max'), 'form-control-success': fields.age_max && fields.age_max.valid}" id="age_max" name="age_max" placeholder="{{ trans('admin.categorie-age.columns.age_max') }}">
        <div v-if="errors.has('age_max')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('age_max') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('age_min'), 'has-success': fields.age_min && fields.age_min.valid }">
    <label for="age_min" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.categorie-age.columns.age_min') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.age_min" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('age_min'), 'form-control-success': fields.age_min && fields.age_min.valid}" id="age_min" name="age_min" placeholder="{{ trans('admin.categorie-age.columns.age_min') }}">
        <div v-if="errors.has('age_min')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('age_min') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('designation'), 'has-success': fields.designation && fields.designation.valid }">
    <label for="designation" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.categorie-age.columns.designation') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.designation" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('designation'), 'form-control-success': fields.designation && fields.designation.valid}" id="designation" name="designation" placeholder="{{ trans('admin.categorie-age.columns.designation') }}">
        <div v-if="errors.has('designation')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('designation') }}</div>
    </div>
</div>


