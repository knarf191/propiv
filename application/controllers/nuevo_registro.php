<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nuevo_registro extends CI_Controller {

    public function index()
    {
        $this->load();
    }

    private function init($msj, $page, $html)
    {
        if($this->session->userdata('logueado'))
        {
            $data = array();
            $data['nombre'] = $this->session->userdata('nombre');
            $data['user'] = $this->session->userdata('user');
            $data['msj']  = $msj;
            $data['page'] = $page;
            $data['html'] = $html;
            $this->load->view('body_login',$data);
        }               
        else
        {       
            redirect(base_url().'login','refresh');
        }
    }

    public function agregar()
    {
        if($this->input->post())
        {
            $data_post = array(
                'folio'       => $this->input->post('folio') ,
                'folio_asoc'  => $this->input->post('folio_asoc') ,
                'fecha'       => $this->input->post('fecha') ,
                'solicita'    => $this->input->post('solicita'),
                'chofer'      => $this->input->post('chofer') , 
                'unidad'      => $this->input->post('unidad'),
                'no_econ'     => $this->input->post('no_econ') ,
                'placas'      => $this->input->post('placas') ,
                'litros'      => $this->input->post('litros') ,
                'costo_litro' => $this->input->post('costo_litro') , 
                'departamento'=> $this->input->post('departamento'),
                'km'          => $this->input->post('km') ,
                'gasolinera'  => $this->input->post('gasolinera') ,
                'descripcion' => $this->input->post('descripcion') ,         
            );

            $costo_litro = $this->input->post('costo_litro');

            $precio = $this->input->post('litros')*$costo_litro;

            
            $saldo       = $this->consultas->getSaldo();
            foreach ($saldo as $key => $row) 
            {
                $id = $row->id;
                $saldo = $this->consultas->getRecargaByFolio($id);
                $saldo_disponible = $saldo['saldo_actual'];
            }

            $saldo_actual = $saldo_disponible-$precio;

            $actualizar_saldo = $this->agregar->updateSaldo($id,$saldo_actual);

            $validation = $this->agregar->setVale($data_post);

            

            if ($validation) 
            {   
                $data = $this->consultas->getFolioV();

                foreach ($data as $key => $row) 
                {
                    $folio = $row->folio;

                    if ($folio==0) 
                    {
                        $folio=1;
                    }   
                }


                echo '<script language="javascript">alert("Los datos se han agregado correctamente");</script>';
               redirect(base_url().'vista_previa_vale?folio='.$folio,'refresh');
            }

            else
            {
                echo '<script language="javascript">alert("No se han podido cargar los datos, intente de nuevo");</script>';
                redirect(base_url().'nuevo_vale','refresh');
            }       
        }
    }

    private function load()
    {
        $data = $this->consultas->getFolioVales();

        $html = '';

        $html .= '<div class="page-header" ><h1>Nuevo Vale de Gasolina</h1></div>'; 
            $html .= '<div class="span12">';
                $html .= '<form class="form-inline" action="'.base_url().'nuevo_vale/agregar" method="post">';
                    /************************************************************************
                                            Solicitante, Fecha y Folio
                    ************************************************************************/
                    $html .= '<div class="col-md-12" id="titles">';
                        $html .= '<div class="col-md-8">';
                            $html .= '<center><h4><b>Solicitante</b></h4></center>';
                        $html .= '</div>';

                        $html .= '<div class="col-md-4">';
                            $html .= '<center><h4><b>Fecha y Folio</b></h4><center>';
                        $html .= '</div>';
                    $html .= '</div>';


                    $html .= '<div class="col-md-12" id="solicitante">';
                        $html .= '<br>';
                        $html .= '<div class="col-md-8">';
                            $html .= '<label>Nombre: &nbsp;</label><input type="text" class="form-control" name="solicita" required id="nombre"><br>';
                            $html .= '<br><label>Departamento:&nbsp;</label><input type="text" class="form-control" name="departamento" required>';
                            $html .= '<label> &nbsp;Combustible:&nbsp;</label>
                                    <select class="form-control" name="descripcion" required>
                                        <option value="" selected disabled>Tipo de combustible</option>
                                        <option value="Gasolina Magna">Gasolina Magna</option>
                                        <option value="Diesel">Diesel</option>
                                    </select><br>';
                            $html .= '<br><label>Gasolinera: &nbsp</label><input type="text" class="form-control" name="gasolinera" required>';
                            $html .= '<label>&nbsp;&nbsp;&nbsp;Costo por litro: &nbsp</label><input type="text" class="form-control" name="costo_litro" required id="costo_litro">';
                        $html .= '</div>';
                            
                        $html .= '<div class="col-md-4">';

                            foreach ($data as $key => $row) 
                            {
                                $folio = $row->folio;   

                                if ($folio==0) 
                                {
                                    $folio=1;
                                } 

                                $html .= '<label>Folio: &nbsp; &nbsp;</label><input type="text" value="'.$folio.'" name="folio" class="form-control" ><br>';
                            }
                            $html .= '<br><label>Folio Asoc.: &nbsp; &nbsp;</label><input type="text" name="folio_asoc" class="form-control" ><br>';

                            $date = date("Y-m-d");
                            $html .= '<br><label>Fecha: &nbsp</label><input type="date"  name="fecha" class="form-control" id="fecha_nuevo_vale" value="'.$date.'">';
                        $html .= '</div>';
                    $html .= '</div>';  

                    /************************************************************************
                                            Datos del Vehiculo
                    ************************************************************************/

                    $html .= '<div class="col-md-12" id="titles">';
                        $html .= '<center><h4><b>Datos Generales del Vehículo</b></h4></center>';
                    $html .= '</div>';

                    $html .= '<div class="col-md-12">';
                        $html .= '<br>';
                        $html .= '<br>';
                        $html .= '<div class="col-md-4">';
                            $html .= '<label>Chofer: &nbsp</label><input type="text" class="form-control" name="chofer" required>';
                            
                        $html .= '</div>';

                        $html .= '<div class="col-md-4">';
                            $html .= '<label>Unidad: &nbsp; &nbsp;&nbsp; &nbsp;</label><input type="text" class="form-control" name="unidad" required>';
                        $html .= '</div>';

                        $html .= '<div class="col-md-4">';
                            $html .= '<label>No. Economico: &nbsp</label><input type="text" class="form-control" name="no_econ" required>';
                        $html .= '</div>';
                    $html .= '</div>';   

                    $html .= '<div class="col-md-12">';
                        $html .= '<br>';
                        $html .= '<br>';
                        $html .= '<div class="col-md-4">';
                            $html .= '<label>Placas: &nbsp</label><input type="text" class="form-control" name="placas" required>';
                        $html .= '</div>';

                        $html .= '<div class="col-md-4">';
                            $html .= '<label>Litros: &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</label><input type="text" class="form-control" name="litros" required>';
                        $html .= '</div>';

                        $html .= '<div class="col-md-4">';
                            $html .= '<label>Descripción: &nbsp; &nbsp;&nbsp;</label><input type="text" class="form-control" name="km">';
                        $html .= '</div>';
                    $html .= '</div>';     

                    $html .= '<div>';
                        $html .= '<input type="submit" class="btn btn-success" value="Aceptar">';

                        $html .= '<button class="btn btn-primary" id="cancelar_vale">&nbsp;Cancelar</button>';
                    $html .= '</div>';     
                $html .= '</form>';
            $html .= '</div>';
        $html .= '</div>';

        $this->init('','principal_login',$html);

    }
}
