import AppForm from '../app-components/Form/AppForm';

Vue.component('categorie-age-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                age_max:  '' ,
                age_min:  '' ,
                designation:  '' ,
                
            }
        }
    }

});