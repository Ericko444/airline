<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nom'), 'has-success': fields.nom && fields.nom.valid }">
    <label for="nom" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.avion.columns.nom') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nom" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nom'), 'form-control-success': fields.nom && fields.nom.valid}" id="nom" name="nom" placeholder="{{ trans('admin.avion.columns.nom') }}">
        <div v-if="errors.has('nom')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nom') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombreplaces'), 'has-success': fields.nombreplaces && fields.nombreplaces.valid }">
    <label for="nombreplaces" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.avion.columns.nombreplaces') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombreplaces" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombreplaces'), 'form-control-success': fields.nombreplaces && fields.nombreplaces.valid}" id="nombreplaces" name="nombreplaces" placeholder="{{ trans('admin.avion.columns.nombreplaces') }}">
        <div v-if="errors.has('nombreplaces')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombreplaces') }}</div>
    </div>
</div>


