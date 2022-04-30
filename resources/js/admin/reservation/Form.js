import AppForm from '../app-components/Form/AppForm';

Vue.component('reservation-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                categorie_id:  '' ,
                montant:  '' ,
                places:  '' ,
                vol_aller_id:  '' ,
                vol_retour_id:  '' ,
                
            }
        }
    }

});