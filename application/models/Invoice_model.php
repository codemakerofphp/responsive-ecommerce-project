<?php

class Invoice_model extends CI_Model
{
	public function select_all_invoice()
      {
    	return $this->db->select('*')
             ->from('tbl_order')
             ->join('tbl_customer','tbl_customer.customer_id=tbl_order.customer_id')
             ->join('tbl_shipping','tbl_shipping.shipping_id=tbl_order.shipping_id')
             ->get()
             ->result();	
     }
	
	
}

?>