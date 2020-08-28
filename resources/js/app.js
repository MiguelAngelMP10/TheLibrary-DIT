/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
window.select2 = require("select2");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    data: {
        idBook: ""
    },
    methods: {
        eliminarRegistro: function(idFormulario) {
            Swal.fire({
                title: "¿Está seguro que quiere eliminar el registro?",
                // text: "Esta operación no se puede revertir",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#1B396A",
                cancelButtonColor: "#942645",
                confirmButtonText: "Borrar",
                cancelButtonText: "Cancelar"
            })
                .then(result => {
                    if (result.value) {
                        document.getElementById(idFormulario).submit();
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },
        mostrarModal: function(idBook, status) {
            this.idBook = idBook;
            if (parseInt(status) == 1) {
                document.getElementById("radio-prestado").checked = true;
            } else {
                document.getElementById("radio-disponible").checked = true;
            }
            $("#modalStatus").modal("show");
        },
        cambiarStatusPrestamo: function() {
            let status = document.querySelector(
                "input[name=estatusPrestamo]:checked"
            ).value;

            Swal.fire({
                title: "¿Está seguro que cambiar el status del prestamo?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Si",
                cancelButtonText: "Cancelar"
            })
                .then(result => {
                    if (result.value) {
                        let link = `book/updateStatusPrestamo/${this.idBook}`;
                        axios
                            .put(link, {
                                statusPrestamo: status
                            })
                            .then(response => {
                                Swal.fire({
                                    icon: "success",
                                    title: response.data.message
                                }).then(result => {
                                    if (result.value) {
                                        location.reload();
                                    }
                                });
                            })
                            .catch(e => {
                                console.log(e);
                            });
                        $("#modalStatus").modal("hide");
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
});

$(document).ready(function() {
    $(".js-example-basic-single").select2({ placeholder: "Select an option" });
});
