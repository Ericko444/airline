<div class="form-group row align-items-center" :class="{'has-danger': errors.has('categorie_id'), 'has-success': fields.categorie_id && fields.categorie_id.valid }">
    <label for="categorie_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reservation.columns.categorie_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.categorie_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('categorie_id'), 'form-control-success': fields.categorie_id && fields.categorie_id.valid}" id="categorie_id" name="categorie_id" placeholder="{{ trans('admin.reservation.columns.categorie_id') }}">
        <div v-if="errors.has('categorie_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('categorie_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('montant'), 'has-success': fields.montant && fields.montant.valid }">
    <label for="montant" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reservation.columns.montant') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.montant" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('montant'), 'form-control-success': fields.montant && fields.montant.valid}" id="montant" name="montant" placeholder="{{ trans('admin.reservation.columns.montant') }}">
        <div v-if="errors.has('montant')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('montant') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('places'), 'has-success': fields.places && fields.places.valid }">
    <label for="places" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reservation.columns.places') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.places" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('places'), 'form-control-success': fields.places && fields.places.valid}" id="places" name="places" placeholder="{{ trans('admin.reservation.columns.places') }}">
        <div v-if="errors.has('places')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('places') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('vol_aller_id'), 'has-success': fields.vol_aller_id && fields.vol_aller_id.valid }">
    <label for="vol_aller_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reservation.columns.vol_aller_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.vol_aller_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('vol_aller_id'), 'form-control-success': fields.vol_aller_id && fields.vol_aller_id.valid}" id="vol_aller_id" name="vol_aller_id" placeholder="{{ trans('admin.reservation.columns.vol_aller_id') }}">
        <div v-if="errors.has('vol_aller_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('vol_aller_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('vol_retour_id'), 'has-success': fields.vol_retour_id && fields.vol_retour_id.valid }">
    <label for="vol_retour_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reservation.columns.vol_retour_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.vol_retour_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('vol_retour_id'), 'form-control-success': fields.vol_retour_id && fields.vol_retour_id.valid}" id="vol_retour_id" name="vol_retour_id" placeholder="{{ trans('admin.reservation.columns.vol_retour_id') }}">
        <div v-if="errors.has('vol_retour_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('vol_retour_id') }}</div>
    </div>
</div>


