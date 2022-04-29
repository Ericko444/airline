import AppForm from '../app-components/Form/AppForm';

Vue.component('vol-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                avion_id:  '' ,
                date_depart:  '' ,
                lieu_arrivee_id:  '' ,
                lieu_depart_id:  '' ,
                
            }
        }
    }

});