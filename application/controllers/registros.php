<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registros extends CI_Controller {

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
                'id'               => '',
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

            $validation = $this->queries->set($data_post);

            if ($validation) 
            {
                echo '<script language="javascript">alert("Los datos se han agregado correctamente");</script>';
                redirect(base_url().'registros','refresh');
            }

            else
            {
                echo '<script language="javascript">alert("No se han podido cargar los datos, intente de nuevo");</script>';
                redirect(base_url().'registros','refresh');
            }       
        }
    }


    function eliminar()
    {       
        $id  = $this->input->post('id');
        $delete = $this->queries->delete($id);

        if($delete)
        {   
            echo "true";        
        }
        else
        {
            echo "false";
        }
    }

    private function load()
    {
        $data = $this->queries->get();
        /*$user = $this->session->userdata('user');
        $data_vale = $this->consultas->getPermisosById($user, "vales");
                */
        
        $html = '';
        $html .= '<div class="page-header" ><h1>REGISTROS</h1></div>'; 
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
                           
                $html .= '<form class="form-inline" action="'.base_url().'registros/agregar" method="post">';
                    $html .= '<table id="table_registros" class="display data_table2">';
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
                            $html .= '<td></td>';
                            $html .= '<td><input type="text" required=""  name="apellido_paterno"   class="form-control"></td>';
                            $html .= '<td><input type="text" required=""  name="apellido_materno"    class="form-control"></td>';
                            $html .= '<td><input type="text" required=""  name="nombre" class="form-control"></td>';
                            $html .= '<td><input type="text" required=""  name="direccion"       class="form-control"></td>';
                            $html .= '<td><input type="text" required=""  name="colonia"   class="form-control"></td>';
                            $html .= '<td><input type="text"   name="seccion"    class="form-control" id="seccion"></td>';
                            $html .= '<td><input type="text"   name="clave_elector" class="form-control"></td>';
                            $html .= '<td><input type="text"   name="telefono"    class="form-control"></td>';
                            $html .= '<td><input type="text"   name="promotor" class="form-control"></td>';
                            $html .= '<td>';
                                $html .= '<input type="submit" name="submit" value="Agregar" class="btn btn-success">';     
                            $html .= '</td>';
                        $html .= '</tr>';

                            if (!empty($data)) 
                            {
                                
                                foreach ($data as $clave => $row) 
                                {
                                    $html .= '<tr>';
                                        $html .= '<td>'.$row->id.'</td>';
                                        $html .= '<td>'.$row->apellido_paterno.'</td>';
                                        $html .= '<td>'.$row->apellido_materno.'</td>';                                      
                                        $html .= '<td>'.$row->nombre.'</td>';
                                        $html .= '<td>'.$row->direccion.'</td>';
                                        $html .= '<td>'.$row->colonia.'</td>';
                                        $html .= '<td>'.$row->seccion.'</td>';
                                        $html .= '<td>'.$row->clave_elector.'</td>';
                                        $html .= '<td>'.$row->telefono.'</td>';
                                        $html .= '<td>'.$row->promotor.'</td>';                                        
                                        $html .= '<td>';
                                            $html .= ' <a href="" class="btn btn-warning" title="Editar" id="editar">';
                                                    $html .= '<i class="fa fa-pencil"></i>';
                                            $html .= '</a>';                                                                                     
                                            $html .= ' <a href="" class="btn btn-danger" title="Eliminar" id="eliminar">';
                                                $html .= '<i class="fa fa-minus-circle"></i>';
                                            $html .= '</a>';
                                        $html .= '</td>';
                                    $html .= '</tr>';
                                    
                                }
                            }
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
