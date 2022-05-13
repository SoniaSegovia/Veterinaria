<?php
class Mascotas
{
    private $DB;

    function __construct($conn)
    {
        $this -> DB = $conn;
    }

    public function Listar($consulta)
    {
        $establecer = $this -> DB -> prepare($consulta);
        $establecer -> execute() > 0;
         
        while($columna = $establecer -> fetch(PDO::FETCH_ASSOC))
        {
            ?> 
            <tr>
            <td><?php echo $columna['idmascota']?></td>
            <td><?php echo $columna['nombre']?></td>
            <td><?php echo $columna['tipoAnimal']?></td>
            <td><?php echo $columna['raza']?></td>
            <td><?php echo $columna['color']?></td>
            <td><?php echo $columna['sexo']?></td>
            <td><?php echo $columna['edad']?></td>
            <td><?php echo $columna['peso']?></td>
            <td>
                <a href="EditarMascotas.php?EditId=<?php echo $columna['idmascotas']?>" class="btn btn-warning">
                <i class='fa fa-pencil yellow-color'></i>
                </a>
            </td>
            <td>
                <a href="EliminarMascotas.php?ElimId=<?php echo $columna['idmascotas']?>" class="btn btn-danger">
                <i class='fa fa-trash red-color'></i>
                </a>
            </td>
        </tr>
            
        <?php
        } 
    }

    public function Actualizar($Id, $nombre, $tipoAnimal, $raza, $color, $sexo, $edad, $peso)
    {
        try
        {
            $establecer = $this -> DB -> prepare("UPDATE mascotas SET nombre= :nombre, 
            tipoAnimal= :tipoAnimal, raza = :raza, color = :color, sexo = :sexo, 
            edad = :edad, peso = :peso WHERE idmascotas = :idmascotas");
            $establecer->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $establecer->bindParam(":tipoAnimal", $tipoAnimal, PDO::PARAM_STR);
            $establecer->bindParam(":raza", $raza, PDO::PARAM_STR);
            $establecer->bindParam(":color", $color, PDO::PARAM_STR);
            $establecer->bindParam(":sexo", $sexo, PDO::PARAM_STR);
            $establecer->bindParam(":edad", $edad, PDO::PARAM_STR);
            $establecer->bindParam(":peso", $peso, PDO::PARAM_STR);
            $establecer->bindParam(":idmascotas", $Id);
            $establecer->execute();

            return true;
        }
        catch(PDOException $Exc)
        {
            echo $Exc->getMessage();
            return false;
        }
    }

    public function Eliminar($Id)
    {
        try
        {
            $establecer = $this -> DB -> prepare("DELETE FROM mascotas WHERE idmascotas=:idmascotas");
            $establecer->bindParam(":idmascotas", $Id);
            $establecer->execute();

            return true;
        }
        catch(PDOException $Exc)
        {
            echo $Exc->getMessage();
            return false;
        }
    }
}
?>