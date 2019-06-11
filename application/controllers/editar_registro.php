<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editar_registro extends CI_Controller {

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

    public function editar()
    {
        if($this->input->post())
        {
            $data_post = array(
                'id'               => $this->input->post('id'),
                'apellido_paterno' => $this->input->post('apellido_paterno') ,
                'apellido_materno' => $this->input->post('apellido_materno') ,
                'nombre'           => $this->input->post('nombre') ,
                'direccion'        => $this->input->post('direccion') ,
                'colonia'          => $this->input->post('colonia') ,
                'seccion'          => $this->input->post('seccion') ,   
                'clave_elector'    => $this->input->post('clave_elector') ,
                'telefono'         => $this->input->post('telefono') ,
                'seccion'          => $this->input->post('seccion') ,      
            );

            $id = $this->input->post('id');
            $validation = $this->queries->update($id,$data_post);

            if ($validation) 
            {
                echo '<script language="javascript">alert("Los datos se han actualizado correctamente");</script>';
                redirect(base_url().'registros','refresh');
            }

            else
            {
                echo '<script language="javascript">alert("No se han podido actualizar los datos, intente de nuevo");</script>';
                redirect(base_url().'registros','refresh');
            }       
        }
    }


    private function load()
    {
        $folio     = $_GET['folio'];
        $data      = $this->queries->getById($folio);
        $apellido_paterno = $data['apellido_paterno'];
        $apellido_materno = $data['apellido_materno'];
        $nombre           = $data['nombre'];
        $direccion        = $data['direccion'];
        $colonia          = $data['colonia'];
        $seccion          = $data['seccion'];
        $clave_elector    = $data['clave_elector'];
        $telefono         = $data['telefono'];
        $promotor         = $data['promotor'];
        
        $html = '';
        $html .= '<div class="page-header" ><h1>EDITAR REGISTRO</h1></div>'; 
            $html .= '<div class="span12">';

                /*$agregar_vale = $data_vale['agregar'];
                if ($agregar_vale=="true") 
                {
                    $html .= '<a href="'.base_url().'nuevo_vale" class="btn btn-success" id="newVale"><i class="fa fa-plus-circle"></i>&nbsp;Nuevo</a>';
                }
                
                $html .= '<a href="'.base_url().'documentos" class="btn btn-default" id="btn-default"><i class="fa fa-file-text-o"></i>&nbsp;Documentos</a>';

                $saldo       = $this->consultas->getSaldo();
                foreach ($saldo as $key => $row) 
                {
                    $folio = $row->id;
                    $saldo = $this->consultas->getRecargaByFolio($folio);
                    $saldo_disponible = $saldo['saldo_actual'];
                    
                }

                
                $ver_saldo = $data_vale['eliminar'];
                if ($ver_saldo == "true") 
                {
                    $html .= '<label class="saldo">SALDO DISPONIBLE: $'.$saldo_disponible.'</label>';
                }*/
                           
                $html .= '<form class="form-inline" action="'.base_url().'editar_registro/editar" method="post">';
                    $html .= '<table id="registro" class="display data_table2">';
                        $html .= '<thead>';
                            $html .= '<tr>';
                                $html .= '<th>ID</th>';
                                $html .= '<th>APELLIDO PATERNO</th>';
                                $html .= '<th>APELLIDO MATERNO</th>';
                                $html .= '<th>NOMBRE(S)</th>';
                                $html .= '<th>CALLE Y NUM</th>';
                                $html .= '<th>COLONIA</th>';
                                $html .= '<th>SECCION</th>';
                                $html .= '<th>CLAVE ELECTOR</th>';
                                $html .= '<th>TELEFONO</th>';
                                $html .= '<th>PROMOTOR</th>';
                                $html .= '<th></th>';
                            $html .= '</tr>';
                        $html .= '</thead>';
                        $html .= '<tbody>';
                        $html .= '<tr>';
                            $html .= '<td><input type="text" required=""  value="'.$folio.'" name="id" id="id"   class="form-control"></td>';
                            $html .= '<td><input type="text" required=""  value="'.$apellido_paterno.'" name="apellido_paterno"   class="form-control"></td>';
                            $html .= '<td><input type="text" required=""  value="'.$apellido_materno.'" name="apellido_materno"    class="form-control"></td>';
                            $html .= '<td><input type="text" required=""  value="'.$nombre.'" name="nombre" class="form-control"></td>';
                            $html .= '<td><input type="text" required=""  value="'.$direccion.'" name="direccion"       class="form-control"></td>';
                            $html .= '<td><input type="text" required=""  value="'.$colonia.'" name="colonia"   class="form-control"></td>';
                            $html .= '<td><input type="text"   value="'.$seccion.'" name="seccion"    class="form-control" id="seccion"></td>';
                            $html .= '<td><input type="text"   value="'.$clave_elector.'" name="clave_elector" class="form-control"></td>';
                            $html .= '<td><input type="text"   value="'.$telefono.'" name="telefono"    class="form-control"></td>';
                            $html .= '<td><input type="text"   value="'.$promotor.'" name="promotor" class="form-control"></td>';
                            $html .= '<td>';
                                $html .= '<input type="submit" name="submit" value="Actualizar" class="btn btn-success">';     
                            $html .= '</td>';
                        $html .= '</tr>';
                        $html .= '</tbody>';
                    $html .= '</table>'; 
                $html .= '</form>';
            $html .= '</div>';
        $html .= '</div>';

        $html .= '<div>';
            $html .= '<input type="hidden" value="'.base_url().'registros/eliminar" id="delete">';
        $html .= '</div>';

        $this->init('','principal_login',$html);

    }
}
