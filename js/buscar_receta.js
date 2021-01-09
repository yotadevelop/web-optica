new Vue({
    el:"#buscar_r",
    data: {
        url: "https://localhost:8080/Web-evaluacion-final/",
        rut:"",
        fecha:"",
        recetas: [],
        receta: {},
    },
    methods:{
        buscarRut: async function(){
            var recurso = "controllers/BuscarXRut.php";
            var form = new FormData();
            form.append("rut", this.rut);
            try {
                const res = await fetch(this.url + recurso,{
                    method: "post",
                    body: form,
                });
                const data = await res.json();
                console.log(data);
                this.recetas = data;
            } catch (error) {
                console.log(error);
            }
        },
        buscarFecha: async function() {
            var recurso = "controllers/BuscarXFecha.php";
            var form = new FormData();
            form.append("fecha", this.fecha);
            try {
                const res = await fetch(this.url + recurso,{
                    method: "post",
                    body: form,
                });
                const data = await res.json();
                console.log(data);
                this.recetas = data;
            } catch (error) {
                console.log(error);
            }
        },
        abrirModal: function(receta){
            this.receta = receta;
            var modal = document.getElementById("modal1");
            var instance = M.Modal.getInstance(modal);
            instance.open();
        },

        generarPDF: function (id) {
            
            window.open(this.url + "controllers/ExportarPDF.php?id=" + id, "_blank");
          },
    },
    created(){}
});