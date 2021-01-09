new Vue({
    el:'#app',
    data: {
        rut:"",
        url: "http://localhost:8080/Web-evaluacion-final/",
        cliente: {},
        id_material_cristal:"",
        id_tipo_cristal:"",
        id_armazon:"",
        tipo_lente:"",
        materiales:[],
        armazones:[],
        Tipos:[],
        base:[],
        esfera_oi:"",
        cilindro_oi:"",
        eje_oi:"",
        esfera_od:"",
        cilindro_od:"",
        eje_od:"",
        prisma:"",
        pupilar:"",
        fecha_entrega:"",
        precio:"",
        fecha_retiro:"",
        observacion:"",
        rut_medico:"",
        nombre_medico:"",
    },
    methods: {
        buscar: async function(){
            const recurso = "controllers/BuscarCliente.php";
            var form = new FormData();
            form.append("rut", this.rut);
            try {
                const res = await fetch(this.url + recurso,{
                    method: "post",
                    body: form,
                });
                const data = await res.json();
                console.log(data);
                if(data == null){
                    M.toast({html: "rut no encontrado"});
                }else{
                    this.cliente = data;

                }
            } catch (error) {
                console.log(error);
            }
        },
        cargaMateriales: async function () {
            try {
              var recurso = "controllers/GetMaterialesCristal.php";
              const res = await fetch(this.url + recurso);
              const data = await res.json();
              this.materiales = data;
              console.log(data);
            } catch (error) {
              console.log(error);
            }
          },
          cargaTipos: async function () {
            try {
              var recurso = "controllers/GetTiposCristal.php";
              const res = await fetch(this.url + recurso);
              const data = await res.json();
              console.log(data);
              this.Tipos = data;
            } catch (error) {
              console.log(error);
            }
          },
          cargaArmazones: async function () {
            try {
              var recurso = "controllers/GetArmazon.php";
              const res = await fetch(this.url + recurso);
              const data = await res.json();
              console.log(data);
              this.armazones = data;
            } catch (error) {
              console.log(error);
            }
          },
        crearReceta: async function(){
            const recurso = "controllers/ControlInsertReceta.php";
            var form = new FormData();
            form.append("tipo_lente",this.tipo_lente);
            form.append("material_cristal",this.materiales);
            form.append("tipo_cristal",this.Tipos);
            form.append("armazon",this.armazones);
            form.append("base",this.base);
            form.append("esfera_oi",this.esfera_oi);
            form.append("esfera_od",this.esfera_od);
            form.append("cilindro_oi",this.cilindro_oi);
            form.append("cilindro_od",this.cilindro_od);
            form.append("eje_oi",this.eje_oi);
            form.append("eje",this.eje_od);
            form.append("prisma",this.prisma);
            form.append("pupilar",this.pupilar);
            form.append("fecha_entrega",this.fecha_entrega);
            form.append("fecha_retiro",this.fecha_retiro);
            form.append("valor_lente", this.precio);
            form.append("observacion",this.observacion);
            form.append("rut_cliente",this.rut);
            form.append("rut_medico",this.rut_medico);
            form.append("nombre_medico",this.nombre_medico);
            try {
                const res = await fetch(this.url + recurso,{
                  method: "post",
                  body: form,
                });
                const data = await res.json();
                console.log(data);
                if(data == null){
                  M.toast({html: "no hay datos"});
                }else{
                  M.toast({html: "hola"});
                }
            
            }catch (error) {
                console.log(error);
                M.toast({html: 'hubo un error'})
            }         
        },
    },
    created(){
        this.cargaMateriales();
        this.cargaTipos();
        this.cargaArmazones();
    },  
});