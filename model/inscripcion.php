<?php 
	/**
	 * 
	 */
	class Inscripcion {
		private $dorsal;
		private $fecha_cursa;
		private $pagado;
		private $precio;
		function __construct()
		{
			# code...
		}
	
    /**
     * @return mixed
     */
    public function getDorsal()
    {
        return $this->dorsal;
    }

    /**
     * @param mixed $dorsal
     *
     * @return self
     */
    public function setDorsal($dorsal)
    {
        $this->dorsal = $dorsal;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaCursa()
    {
        return $this->fecha_cursa;
    }

    /**
     * @param mixed $fecha_cursa
     *
     * @return self
     */
    public function setFechaCursa($fecha_cursa)
    {
        $this->fecha_cursa = $fecha_cursa;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPagado()
    {
        return $this->pagado;
    }

    /**
     * @param mixed $pagado
     *
     * @return self
     */
    public function setPagado($pagado)
    {
        $this->pagado = $pagado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     *
     * @return self
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }
}
?>