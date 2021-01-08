<?php

namespace models;

require_once("Conexion.php");

class RecetaModel{

    public function insertarReceta($data){
        $stm = Conexion::conector()->prepare("INSERT INTO receta VALUES(NULL,:tipolente,:esferaoiz,:esferaode,:cilindrooiz,:cilindroode,:ejeoiz,:ejeode,:prisma,:base,
        :armazon,:materialcristal,:tipocristal,
        :distanciapupilar,:valorlente,:fechaentrega,:fecharetiro,:observacion,:rutcliente,:fechavimed,:rutmedico,:nombremedico,:rutusuario,1)");
         $stm->bindParam(":tipolente",$data['tipo_lente']);
         $stm->bindParam(":esferaoiz",$data['esfera_oiz']);
         $stm->bindParam(":esferaode",$data['esfera_ode']);
         $stm->bindParam(":cilindrooiz",$data['cilindro_oiz']);
         $stm->bindParam(":cilindroode",$data['cilindro_ode']);
         $stm->bindParam(":ejeoiz",$data['eje_oiz']);
         $stm->bindParam(":ejeode",$data['eje_ode']);
         $stm->bindParam(":prisma",$data['prisma']);
         $stm->bindParam(":base",$data['base']);
         $stm->bindParam(":armazon",$data['armazon']);
         $stm->bindParam(":materialcristal",$data['material_cristal']);
         $stm->bindParam(":tipocristal",$data['tipo_cristal']);
         $stm->bindParam(":distanciapupilar",$data['distancia_pupilar']);
         $stm->bindParam(":valorlente",$data['valor_lente']);
         $stm->bindParam(":fechaentrega",$data['fecha_entrega']);
         $stm->bindParam(":fecharetiro",$data['fecha_retiro']);
         $stm->bindParam(":observacion",$data['observacion']);
         $stm->bindParam(":rutcliente",$data['rut_cliente']);
         $stm->bindParam(":fechavimed",$data['fecha_vimed']);
         $stm->bindParam(":rutmedico",$data['rut_medico']);
         $stm->bindParam(":nombremedico",$data['nombre_medico']);
         $stm->bindParam(":rutusuario",$data['rut_usuario']);
         return $stm->execute();
     }
    public function recetaXRut($rut){
        $sql = ' SELECT id_receta "id", tipo_lente, esfera_oi, esfera_od, cilindro_oi, cilindro_od, eje_oi, ';
        $sql.= ' eje_od, prisma, base, ar.nombre_armazon "armazon", mt.material_cristal, tc.tipo_cristal, ';
        $sql.= ' distancia_pupilar, valor_lente "precio", fecha_entrega, fecha_retiro, observacion, cl.rut_cliente, ';
        $sql.= ' cl.nombre_cliente, cl.telefono_cliente, us.nombre "nombre_vendedor", receta.estado FROM receta ';
        $sql.= ' INNER JOIN material_cristal mt on mt.id_material_cristal=receta.material_cristal ';
        $sql.= ' inner join armazon ar on ar.id_armazon=receta.armazon '; 
        $sql.= ' inner join tipo_cristal tc on tc.id_tipo_cristal = receta.tipo_cristal ';
        $sql.= ' inner join cliente cl on cl.rut_cliente = receta.rut_cliente ';
        $sql.= ' inner join usuario us on us.rut = receta.rut_usuario ';
        $sql.= ' WHERE receta.rut_cliente = :A';
        $stm = Conexion::conector()->prepare($sql);
        $stm->bindParam(":A", $rut);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function recetasXId($id){
        $sql = '
            select id_receta "id", tipo_lente, esfera_oi, esfera_od,
            cilindro_oi, cilindro_od, eje_oi, eje_od, prisma, base,
            ar.nombre_armazon "armazon", mt.material_cristal,
            tc.tipo_cristal, distancia_pupilar, valor_lente "precio",
            fecha_entrega, fecha_retiro, observacion, cl.rut_cliente,
            cl.nombre_cliente, cl.telefono_cliente, us.nombre "nombre_vendedor",
            receta.estado
            from receta
            inner join material_cristal mt 
                on mt.id_material_cristal=receta.material_cristal
            inner join armazon ar 
                on ar.id_armazon = receta.armazon
            inner join tipo_cristal tc
                on tc.id_tipo_cristal = receta.tipo_cristal
            inner join cliente cl 
                on cl.rut_cliente = receta.rut_cliente
            inner join usuario us
                on us.rut = receta.rut_usuario
            where receta.id_receta = :A
        ';

        $stm = Conexion::conector()->prepare($sql);
        $stm->bindParam(":A", $id);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function recetaXFechas($fecha){
        $sql = '
        SELECT id_receta "id", tipo_lente, esfera_oi, esfera_od,
        cilindro_oi, cilindro_od, eje_oi, eje_od, prisma, base,
        ar.nombre_armazon "armazon", mt.material_cristal,
        tc.tipo_cristal, distancia_pupilar, valor_lente "precio",
        fecha_entrega, fecha_retiro, observacion, cl.rut_cliente,
        cl.nombre_cliente, cl.telefono_cliente, us.nombre "nombre_vendedor",
        receta.estado
        from receta
        inner join material_cristal mt 
            on mt.id_material_cristal=receta.material_cristal
        inner join armazon ar 
            on ar.id_armazon = receta.armazon
        inner join tipo_cristal tc
            on tc.id_tipo_cristal = receta.tipo_cristal
        inner join cliente cl 
            on cl.rut_cliente = receta.rut_cliente
        inner join usuario us
            on us.rut = receta.rut_usuario
        WHERE receta.fecha_entrega = :A  ';
        $stm = Conexion::conector()->prepare($sql);
        $stm->bindParam(":A", $fecha);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getMaterialCristal(){
        $stm = Conexion::conector()->prepare("SELECT * FROM material_cristal");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function getArmazon(){
        $stm = Conexion::conector()->prepare("SELECT * FROM armazon");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function getTiposCristal(){
        $stm = Conexion::conector()->prepare("SELECT * FROM tipo_cristal");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
}