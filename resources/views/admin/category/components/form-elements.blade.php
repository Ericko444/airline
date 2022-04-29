<div class="form-group row align-items-center" :class="{'has-danger': errors.has('designation'), 'has-success': fields.designation && fields.designation.valid }">
    <label for="designation" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.category.columns.designation') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.designation" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('designation'), 'form-control-success': fields.designation && fields.designation.valid}" id="designation" name="designation" placeholder="{{ trans('admin.category.columns.designation') }}">
        <div v-if="errors.has('designation')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('designation') }}</div>
    </div>
</div>


