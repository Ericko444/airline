import AppForm from '../app-components/Form/AppForm';

Vue.component('avion-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nom:  '' ,
                nombreplaces:  '' ,
                
            }
        }
    }

});