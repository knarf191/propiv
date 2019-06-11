<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Queries extends CI_Model {

	function __construct()
  	{         
		parent::__construct();     
 	}
	

	/********************************************************
						LOGIN
	*********************************************************/		

	function login($user, $password)
	{
		$query = $this->db->query("SELECT * FROM usuarios WHERE user ='$user' and password = '$password'");

		if ($query->num_rows() > 0)
		{		     
		 	return TRUE;
		}   
		else
		{		    
			return FALSE;
		}		
	} 

	function getDatabyUser($user)
	{
		$query = $this->db->query("SELECT * FROM usuarios WHERE user = '$user' ");
		
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}  
	}


	/********************************************************
				 Queries
	*********************************************************/

	function get() 
	{
		$query = $this->db->get('registros');

		if ($query->num_rows() > 0)
		{
			return $query->result();

		}
		else
		{
			return FALSE;
		}
	}		

	function set($data_post)
	{
		return $this->db->insert('registros',$data_post);
	}

	function delete($id)
	{
		$this->db->where('id', $id);

		return $this->db->delete('registros');
	}

	function getById($folio) 
	{
		$query = $this->db->query("SELECT * FROM registros WHERE id = '$folio' ");
		
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		} 
	}

	function update($id,$data_post)
	{
		$this->db->where('id', $id);

		return $this->db->update('registros',$data_post);
	}
}