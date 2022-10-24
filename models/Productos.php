<?php
class Producto extends Conectar
{
    public function get_producto()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tm_producto WHERE estado = 1";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_producto_id($prod_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tm_producto WHERE id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $prod_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function delete_producto_id($prod_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tm_producto 
                SET
                    estado=0,
                    fecha_elim=now()
                WHERE
                    id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $prod_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function insert_producto_id($prod_nombre)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO tm_producto
                    (id, nombre, fecha_crea, fecha_mod, fecha_elim, estado)
                VALUES
                    (NULL, ?, now(), NULL, NULL, 1);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $prod_nombre);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_producto_id($prod_id, $prod_nombre)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tm_producto 
                SET
                    nombre=?,
                    fecha_modi=now()
                WHERE
                    id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $prod_nombre);
        $sql->bindValue(2, $prod_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
}
