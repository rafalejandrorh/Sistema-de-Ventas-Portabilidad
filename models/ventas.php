<?php 


class ventas 
{

    private $db;
    private $ventas;

    public function __construct()
    {
        
        $this->db = Conectar::conexion();
        $this->ventas = array();

    }

	public function asistentes_atiempo_hoy()
    {
		include "../admin/includes/timezone.php";
		$today = date('Y-m-d');

		$sql = "SELECT * FROM asistencia WHERE date = '$today' AND status = 1";
        $query = $this->db->query($sql);

        $this->asistentes_atiempo_hoy[] = $query;

        return $this->asistentes_atiempo_hoy;

    }

	public function asistentes_tarde_hoy()
    {
		include "../admin/includes/timezone.php";
		$today = date('Y-m-d');
		
		$sql = "SELECT * FROM asistencia WHERE date = '$today' AND status = 0";
        $query = $this->db->query($sql);

        $this->asistentes_tarde_hoy[] = $query;

        return $this->asistentes_tarde_hoy;

    }

	public function asistentes_atiempo()
    {
		
        $sql = "SELECT * FROM asistencia";
        $query = $this->db->query($sql);

        $this->asistentes_atiempo[] = $query;

        return $this->asistentes_atiempo;

    }

	public function asistentes_tarde()
    {

		$sql = "SELECT * FROM asistencia WHERE status = 1";
		$query = $this->db->query($sql);

        $this->asistentes_tarde[] = $query;

        return $this->asistentes_tarde;

    }


    public function obtener_ventas($from, $to)
    {


        return $this->asistencia;

    }

	public function insertar_ventas($employee, $status, $date_now)
    {


		return $this->$_SESSION;

	}


    public function editar_ventas($date, $time_in, $time_out, $id)
    {


        return $this->$_SESSION;

    }

    public function eliminar_ventas($id)
    {


        return $this->$_SESSION;

    }

    public function obtener_ventasdia()
    {

        date_default_timezone_set('America/Caracas');
                        
        $Date = date('Y-m-d');
        $sql="SELECT * from ventastotales WHERE FECHA_CARGA = '$Date'";
        $query = $this->db->query($sql);
        while($row = $query->fetch_assoc()){

        $this->ventas[] = $row;

        }

        return $this->ventas;

    }

    public function obtener_ventasdia_rac($rac)
    {

        date_default_timezone_set('America/Caracas');
                        
        $Date = date('Y-m-d');
        $sql="SELECT * from ventastotales WHERE FECHA_CARGA = '$Date' AND VENDEDOR = '$rac'";
        $query = $this->db->query($sql);

        $this->ventas[] = $query;

        return $this->ventas;

    }

    public function obtener_ventasdia_rac_cargadas($rac)
    {

        date_default_timezone_set('America/Caracas');
                        
        $Date = date('Y-m-d');

        $sql="SELECT * from ventastotales WHERE FECHA_CARGA = '$Date' AND VENDEDOR = '$rac' AND ESTATUS = 'LISTA ONIX'";
        $query = $this->db->query($sql);

        $this->ventas[] = $query;

        return $this->ventas;

    }

    public function obtener_ventas_mes($MES)
    {

        $sql = "SELECT * FROM ventastotales WHERE MES = '$MES'";
        $query = $this->db->query($sql);

        $this->ventas[] = $query;

        return $this->ventas;

    }

    public function obtener_ventas_onix($MES)
    {

        $sql = "SELECT * FROM ventastotales WHERE MES = '$MES' AND ESTATUS = 'LISTA ONIX'";
        $query = $this->db->query($sql);

        $this->ventas[] = $query;

        return $this->ventas;

    }

    public function obtener_ventas_altas($MES)
    {

        $sql = "SELECT * FROM ventastotales WHERE ESTATUS_CM = 'ALTA' and MES = '$MES'";
        $query = $this->db->query($sql);

        $this->ventas[] = $query;

        return $this->ventas;

    }

    public function obtener_ventas_altas_CM($MES)
    {

        $sql = "SELECT * FROM ventastotales WHERE ESTATUS_CM = 'ALTA' and MES_ALTA = '$MES'";
        $query = $this->db->query($sql);

        $this->ventas[] = $query;

        return $this->ventas;

    }

    public function obtener_ventas_altas_pospago($MES)
    {

        $sql = "SELECT * FROM ventastotales WHERE ESTATUS_CM = 'ALTA/POSPAGO' and MES = '$MES'";
        $query = $this->db->query($sql);

        $this->ventas[] = $query;

        return $this->ventas;

    }

    public function obtener_ventas_sinestatus($MES)
    {

        $sql = "SELECT * FROM ventastotales WHERE ESTATUS_CM = 'SIN ESTATUS' and MES = '$MES'";
        $query = $this->db->query($sql);

        $this->ventas[] = $query;

        return $this->ventas;

    }

    public function obtener_ventas_bajas($MES)
    {

        $sql = "SELECT * FROM ventastotales WHERE ESTATUS_CM = 'BAJA/EXPORTADA' and MES = '$MES'";
        $query = $this->db->query($sql);

        $this->ventas[] = $query;

        return $this->ventas;

    }

    public function obtener_configventas()
    {

        $sql="SELECT MES_VENTAS from ventas_config WHERE ID = 1";
        $query = $this->db->query($sql);
        $MES = $query->fetch_assoc();

        $this->ventas[] = $MES;

        return $this->ventas;

    }
}

?>
