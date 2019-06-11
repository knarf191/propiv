<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_session extends CI_Controller 
{

	function in()
	{
		if($this->input->post())
		{
			$user    = $this->input->post('user');
			$password = $this->input->post('password');

			$query  = $this->queries->login($user, $password);

			if($query)
			{

				$datos = $this->queries->getDatabyUser($user);

				$sesion_data = array('nombre'   => $datos['nombre'],
									 'user' 	=> $datos['user'],
									 'password'	=> $datos['password'],
									 'logueado' => TRUE);	
																					
				$this->session->set_userdata($sesion_data);	


				redirect(base_url().'registros','refresh');
			
			}	
			else
			{
				echo '<script language="javascript">alert("Usuario o contraseña inválido");</script>'; 
				redirect(base_url().'login','refresh');
			}
		}
		else
		{
			echo '<script language="javascript">alert("Por favor llene todos los campos");</script>'; 
            redirect(base_url().'login','refresh');
		}
	}

	function close_session()
	{
		$sesion_data = array ('logueado' => FALSE);
		$this->session->set_userdata($sesion_data);
 	    redirect(base_url().'login', 'refresh');
	}
}