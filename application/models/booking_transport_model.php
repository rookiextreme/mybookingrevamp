<?php

class Booking_transport_model extends CI_Model {
    
    var $tableU = 'user_profiles';
    var $tableU2 = 'position_name';
    var $tbook = 'booking';
    var $table = 'booking_transports';
    var $table_select_total = 'booking_transports, count(booking_transports) as total';
    var $table_group_by_1 = 'booking_transports';
    var $order_by1 = array(
        'form-list' => 'user_profiles.full_name ASC'
    );
    var $order_by = array(
        'form-list' => 'booking_transports.created ASC'
    );
    var $transport_types = array(
        1 => array('Kereta', 'orang'),
        2 => array('MPV', 'orang'),
        3 => array('Lori', 'tan'),
        4 => array('SUV', 'orang'),
        5 => array('Bas', 'orang'),
    );
    var $trip_types = array(
        1 => 'Satu Hala',
        2 => 'Dua Hala',
    );
    
    var $OutStation = array(
        0 => 'Tidak Outstation Dan Bermalam',
        1 => 'Outstation Dan Bermalam',
    );
    
    function getAllRecords($order_by = '') {
        $this->db->select("{$this->table}.*")
                ->from($this->table);

        if (!empty($order_by)) {
            $this->db->order_by($order_by);
        }

        $query = $this->db->get();

        $result = array();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
        }

        return $result;
    }

    function getTotalRecordsInGroup($order_by = '') {
        $this->db->select("{$this->table_select_total}")
                ->from($this->table)
                ->group_by($this->table_group_by_1);

        $query = $this->db->get();

        $result = array();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $result[] = $row;
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

    function setRecord($data, $id = 0, $delete = false) {
        if ($delete) {
            $id = (strpos($id, ',') !== FALSE) ? "IN ($id)" : "= $id";
            $query = "DELETE FROM {$this->table} WHERE id $id";
        } else {
            $fields = array();
                        $fields2 = array();
                            foreach ($data as $key => $val):
                                $fields[] = "$key='$val'";
                                $fields2[] = "$key";
                                $values[] = "'$val'";
                            endforeach;

                            $fields = implode(',', $fields);
                            $fields2 = implode(',', $fields2);
                            $values = implode(',', $values);

                        if (empty($id)) {
                                $query_type = 'INSERT INTO';
                                $query = "$query_type {$this->table} ($fields2) VALUES ($values) ";
                        } else {
                                $query_type = 'UPDATE';
                                $query = "$query_type {$this->table} SET $fields";
                        }

                        

                        if (!empty($id)) {
                                $query .= "WHERE id=$id";
                        }
                }

                return $this->db->query($query);
        }

        //unused function
        function get_driver_old($order_by1 = '') {
	$this->db->select("{$this->tableU}.*")
		->from($this->tableU)
                ->where("{$this->tableU2} LIKE '%pemandu%'");

                if (!empty($order_by1)) {
                    $this->db->order_by($order_by1);
                }

                $query = $this->db->get();

                $result = array();

                if ($query->num_rows() > 0) {
                    foreach ($query->result() as $row) {
                        $result[] = $row;
                    }
                }

	return $result;
    }
    
    function get_driver($start_date , $end_date) {
        
        //$start = pg_escape_string($start_date); 
        $start = date('Y-m-d H:i:s',strtotime($start_date));
        $end = date('Y-m-d H:i:s',strtotime($end_date));
        //$end = pg_escape_string($end_date);        
        $sql = "select * from {$this->tableU} where full_name NOT IN (select full_name from {$this->tableU} where full_name IN 
                (SELECT driver FROM {$this->tbook} WHERE (start_date >= '$start' AND
                end_date < '$end') OR (start_date <= '$start' AND end_date > '$start') OR
                (start_date > '$start' AND end_date <= '$end')  AND booking_type = '4' AND driver IS NOT NULL) AND {$this->tableU2} 
                LIKE 'PEMANDU%' ) and {$this->tableU2} LIKE 'PEMANDU%'";

                if (!empty($order_by1)) {
                    $this->db->order_by($order_by1);
                }
                
                $query=$this->db->query($sql);

                //$query = $this->db->get();
                $result = array();
                //echo '<pre>';die($this->db->last_query());
                if ($query->num_rows() > 0) {
                    foreach ($query->result() as $row) {
                        $result[] = $row;
                    }
                }

	return $result;
    }
}

        

/* End of file booking_transport_model.php */
/* Location: ./application/models/booking_transport_model.php */