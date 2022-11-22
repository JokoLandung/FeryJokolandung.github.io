var app = new Vue({
    el: '#vuejscrudcars',
    data:{
        showAddModal: false,
        showEditModal: false,
        showDeleteModal: false,
        errorMessage: "",
        successMessage: "",
        cars: [],
        newCar: {brand: '', model: '', price: ''},
        clickCar: {}
    },
 
    mounted: function(){
        this.getAllCars();
    },
 
    methods:{
        getAllCars: function(){
            axios.get('api.php')
                .then(function(response){
                    //console.log(response);
                    if(response.data.error){
                        app.errorMessage = response.data.message;
                    }
                    else{
                        app.cars = response.data.cars;
                    }
                });
        },
 
        saveCar: function(){
            //console.log(app.newCar);
            var memForm = app.toFormData(app.newCar);
            axios.post('api.php?crud=create', memForm)
                .then(function(response){
                    //console.log(response);
                    app.newCar = {brand: '', model: '', price: ''};
                    if(response.data.error){
                        app.errorMessage = response.data.message;
                    }
                    else{
                        app.successMessage = response.data.message
                        app.getAllCars();
                    }
                });
        },
 
        updateCar(){
            var memForm = app.toFormData(app.clickCar);
            axios.post('api.php?crud=update', memForm)
                .then(function(response){
                    //console.log(response);
                    app.clickCar = {};
                    if(response.data.error){
                        app.errorMessage = response.data.message;
                    }
                    else{
                        app.successMessage = response.data.message
                        app.getAllCars();
                    }
                });
        },
 
        deleteCar(){
            var memForm = app.toFormData(app.clickCar);
            axios.post('api.php?crud=delete', memForm)
                .then(function(response){
                    //console.log(response);
                    app.clickCar = {};
                    if(response.data.error){
                        app.errorMessage = response.data.message;
                    }
                    else{
                        app.successMessage = response.data.message
                        app.getAllCars();
                    }
                });
        },
 
        selectCar(car){
            app.clickCar = car;
        },
 
        toFormData: function(obj){
            var form_data = new FormData();
            for(var key in obj){
                form_data.append(key, obj[key]);
            }
            return form_data;
        },
 
        clearMessage: function(){
            app.errorMessage = '';
            app.successMessage = '';
        }
 
    }
});