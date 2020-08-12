<?php

class Tipo_Regime_Apuracao_model extends CI_Model
{

    public function ListaTipoRegimeApuracao()
    {
        $this->db->select('*');
        $this->db->from(' tipo_regime_apuracao ');
        $this->db->where(' fl_ativo ', true);
        

        $query = $this->db->get();

        return $query;
    }
}