<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nom'), 'has-success': fields.nom && fields.nom.valid }">
    <label for="nom" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lieu.columns.nom') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nom" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nom'), 'form-control-success': fields.nom && fields.nom.valid}" id="nom" name="nom" placeholder="{{ trans('admin.lieu.columns.nom') }}">
        <div v-if="errors.has('nom')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nom') }}</div>
    </div>
</div>


