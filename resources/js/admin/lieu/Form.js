import AppForm from '../app-components/Form/AppForm';

Vue.component('lieu-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nom:  '' ,
                
            }
        }
    }

});