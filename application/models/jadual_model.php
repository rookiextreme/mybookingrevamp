<?php

/*Aiman Shakir JKR Create For Jadual (On Tv Screen)*/

class Jadual_model extends CI_Model {

        var $table = 'booking_rooms';
        var $table1 = 'rooms';
        var $table2 = 'booking';
        var $table_fk_booking_id = 'booking.fk_booking_id';
        var $table_reference_booking_rooms_pk_id = 'booking_rooms.booking_room_id';
        var $table_fk_room_id = 'fk_room_id';
        var $table_rooms_id = 'table_rooms_id';
        var $order_by = ' booking.full_day DESC, booking.start_date ASC , booking.end_date ASC';
        
 
        
        function getAllRecords($order_by , $tomorrow1) {
                $this->db->select("{$this->table}.*, {$this->table1}.*, {$this->table2}.*")
                        ->from($this->table2)
                        ->join($this->table, "{$this->table2}.fk_booking_id = {$this->table}.booking_room_id", "inner")
                        ->join($this->table1, "{$this->table}.fk_room_id = {$this->table1}.room_id", "inner")
                        ->where("{$this->table2}.booking_type = 1")
                        ->where("{$this->table2}.booking_status = 1 AND start_date::text Like '$tomorrow1%'");
                        
                        

                if (!empty($this->order_by)) {
                        $this->db->order_by($this->order_by);
                }

                $query = $this->db->get();
                 //echo '<pre>';die($this->db->last_query());
                 $result = array();
                    if ($query && $query->num_rows() > 0) {
                        if (!empty($id)) {
                            $result = $query->row();
                        } else {
                            foreach ($query->result() as $row) {
                                $result[] = $row;
                            }
            }
        }

        return $result;
        }

        function getRecordById($id) {
                $query = $this->db->get_where($this->table, array('id' => $id));

                $result = $query->row();

                return (!empty($result)) ? $result : array();
        }
        
        function getAjaxRecordWithConditions($where_conditions) {
                $this->db->select()
                        ->from($this->table)
                        ->where($where_conditions);
                
                $query = $this->db->get();
                
                $result = array();
                if ($query->num_rows() > 0) {
                        foreach ($query->result() as $row) {
                                $result[] = $row;
                        }
                }
                
                return $result;
        }

}

/* End of file transport.php */
/* Location: ./application/models/transport.php */