<?php 


class plantilla 
{

    private $db;
    private $plantilla;

    public function __construct()
    {
        
        $this->db = Conectar::conexion();
        $this->plantilla = array();

    }

    public function obtener_plantilla_activa()
    {

        $sql = "SELECT * FROM plantilla where ESTATUS=1";
        $query = $this->db->query($sql);
        while($row = $query->fetch_assoc()){

            $this->plantilla[] = $row;
        }

        return $this->plantilla;

    }

    public function obtener_numero_de_activos()
    {

        $sql = "SELECT * FROM plantilla where ESTATUS=1";
        $query = $this->db->query($sql);

        $this->plantilla[] = $query;

        return $this->plantilla;

    }

	public function insertar_plantilla($employee, $status, $date_now)
    {


		return $this->$_SESSION;

	}


    public function editar_plantilla($date, $time_in, $time_out, $id)
    {


        return $this->$_SESSION;

    }

    public function eliminar_plantilla($id)
    {


        return $this->$_SESSION;

    }

}

?>
