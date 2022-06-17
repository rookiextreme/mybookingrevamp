<?php

class User_model extends CI_Model {

    var $table = 'users';
    var $table_pk_id = 'users.id';
    var $table_user_username = 'users.username';
    var $table_profile_nokp = 'user_profiles.nokp';
    var $table_reference_user_profiles = 'user_profiles';
    var $table_reference_user_profiles_select_fields = 'user_profiles.full_name, user_profiles.position_name, user_profiles.position_level, user_profiles.department_name, user_profiles.contact_office, user_profiles.contact_mobile';
    var $table_reference_user_profiles_fk_id = 'user_profiles.fk_user_id';
    var $user_levels = array(
        0 => 'Pengguna',
        1 => 'Pentadbir Utama',
        2 => 'Pentadbir Bahagian',
        3 => 'Ketua Pemandu',
        4 => 'Pentadbir Peralatan',
    );
    var $user_status = array(
        0 => 'Belum Aktif',
        1 => 'Aktif',
        2 => 'Tidak Aktif',
    );
    
    public function getCountUsers($params1) {
        $this->db->select("{$this->table}.*")
                ->from($this->table)
                ->where("users.user_level NOT IN(1,3)");
        
        $query = $this->db->get();

        return $query->num_rows();
    }

    function getAllRecords($where_clause = '') {
        
//         $secound_db = $this->load->database('mykj', TRUE);
//         $secound_db->load->model-('list_pegawai2');
//         $query = $secound_db->get('list_pegawai2');
       
        $this->db->select("{$this->table}.*, {$this->table_reference_user_profiles}.*")
                ->from($this->table)->where('deleted != 1')
                ->join($this->table_reference_user_profiles, "{$this->table_user_username} = {$this->table_profile_nokp}", 'left');
//                ->join($this->table_reference_user_profiles, "{$this->table_pk_id} = {$this->table_reference_user_profiles_fk_id}", 'left');
        if (!empty($where_clause)) {
            $this->db->where($where_clause);
        }

        $query = $this->db->get();

        $result = array();
        foreach ($query->result() as $row) {
            $result[] = $row;
        }

        return $result;
    }

    function getEmailById($getUserFkId) {
        $this->db->select("{$this->table}.email");
        $this->db->from($this->table);
        $this->db->where("{$this->table_pk_id} = $getUserFkId");
        $this->db->limit(1);

        $query = $this->db->get();

        //$result = $query->row();

        //return (!empty($result)) ? $result : array();
        return $query;
    }
    
    function getRecordById($id) {
        $this->db->select("{$this->table}.*, {$this->table_reference_user_profiles}.*");
        $this->db->from($this->table);
        $this->db->join($this->table_reference_user_profiles, "{$this->table_user_username} = {$this->table_profile_nokp}", 'left');
        $this->db->where("{$this->table_pk_id} = $id");
        $this->db->limit(1);

        $query = $this->db->get();
        $result = $query->row();
//        echo '<pre>';
//        print_r($this->db->last_query());
//        echo '</pre>';
//        die();
        return (!empty($result)) ? $result : array();
    }
    
    function getRecordByUserLevel($userlevel) {
        $this->db->select("{$this->table}.*, {$this->table_reference_user_profiles}.*");
        $this->db->from($this->table);
        $this->db->join($this->table_reference_user_profiles, "{$this->table_pk_id} = {$this->table_reference_user_profiles_fk_id}", 'left');
        $this->db->where("{$this->table}.user_level = $userlevel");
        $this->db->limit(1);

        $query = $this->db->get();

        $result = $query->row();

        return (!empty($result)) ? $result : array();
    }
    
    
    function getEmelNotelSec($nama){
        
        $this->db->select("{$this->table}.*, {$this->table_reference_user_profiles}.*")
                ->from($this->table)
                ->join($this->table_reference_user_profiles, "{$this->table}.id = {$this->table_reference_user_profiles}.fk_user_id")
                ->where("{$this->table_reference_user_profiles}.full_name LIKE '%$nama%'");

        $query = $this->db->get();
        //echo '<pre>';die($this->db->last_query());



        if($query){
            $result = $query->row();
            return (!empty($result)) ? $result : array();
        }else{
            return array();
        }

    }
    
    function getRecordByEmail($email) {
        $this->db->select("{$this->table}.*, {$this->table_reference_user_profiles}.*");
        $this->db->from($this->table);
        $this->db->join($this->table_reference_user_profiles, "{$this->table_pk_id} = {$this->table_reference_user_profiles_fk_id}", 'left');
        $this->db->where("users.email = '$email'");
        $this->db->limit(1);

        $query = $this->db->get();

        $result = $query->row();

        return (!empty($result)) ? $result : array();
    }

    function setRecord($data, $id = 0, $delete = false) {
        if ($delete) {
            $id = (strpos($id, ',') !== FALSE) ? "IN ($id)" : "= $id";
            //$query = "DELETE FROM {$this->table} WHERE id $id";

            $query = "
            DELETE {$this->table}, {$this->table_reference_user_profiles}
            FROM {$this->table}
            JOIN user_profiles ON users.id = user_profiles.fk_user_id
            WHERE users.id $id";

            return $this->db->query($query);
        } else {
            if (!empty($id)) {
                $this->db->where('id', $id);

                $result = $this->db->update($this->table, $data);

                return $result;
            } else {
                if (isset($data['insert_batch']) && $data['insert_batch']) {
                    return $this->db->insert_batch($this->table, $data['data']);
                } else {
                    return $this->db->insert($this->table, $data);
                }
            }
        }
    }
    
    function setRecord2($activated, $user_level, $user_id) {
                $this->db->set('user_level', $user_level);
                $this->db->set('activated', $activated);
                $this->db->where('id', $user_id);

                $this->db->update($this->table_name);
                return $this->db->affected_rows() > 0;
        }

    function setRecordForUserProfiles($data, $id = 0, $delete = false) {
        if ($delete) {
            $id = (strpos($id, ',') !== FALSE) ? "IN ($id)" : "= $id";
            $query = "DELETE FROM {$this->table_reference_user_profiles} WHERE fk_user_id $id";

            return $this->db->query($query);
        } else {
            if (!empty($id)) {
                $this->db->where($this->table_reference_user_profiles_fk_id, $id);

                $result = $this->db->update($this->table_reference_user_profiles, $data);

                return $result;
            } else {
                if (isset($data['insert_batch']) && $data['insert_batch']) {
                    return $this->db->insert_batch($this->table_reference_user_profiles, $data['data']);
                } else {
                    return $this->db->insert($this->table_reference_user_profiles, $data);
                }
            }
        }
    }

    function getRecordHeadDriver($user_level = 3) {
        $this->db->select("{$this->table}.*, {$this->table_reference_user_profiles}.*");
        $this->db->from($this->table);
        $this->db->join($this->table_reference_user_profiles, "{$this->table_pk_id} = {$this->table_reference_user_profiles_fk_id}", 'left');
        $this->db->where("{$this->table}.user_level = $user_level");
        $this->db->limit(1);

        $query = $this->db->get();

        $result = $query->row();

        return (!empty($result)) ? $result : array();
    }

    function getUniqueness($str) {
        $this->db->select("{$this->table}.email")
                ->from($this->table)
                ->where("{$this->table}.email = '$str'")
                ->limit(1);

        $query = $this->db->get();

        return $query;
    }

}

/* End of file user.php */
/* Location: ./application/models/user.php */