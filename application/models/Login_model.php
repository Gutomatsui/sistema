<?php

class Login_model extends CI_Model
{
    public function login($email, $senha)
    {
        $this->db->select('*');
        $this->db->from(' usuario ');
        $this->db->where(' email ', $email);
        $this->db->where(' senha ', $senha);

        $query = $this->db->get();


        return $query;
    }

    //Retorna o menu do usuário.
    public function menu($id_perfil)
    {
        $this->db->select('menu_item.id, menu_item.titulo, menu_item.id_pai, menu_item.action, menu_item.icone, menu_item.fl_unico, menu_item.ordem ');
        $this->db->from(' menu_item ');
        $this->db->join('menu_perfil', 'menu_perfil.id_menu_item = menu_item.id');
        $this->db->where('menu_perfil.id_perfil ', $id_perfil);
        $query = $this->db->get();

        $menu = "";
        $id_menu = 0;

        if($id_perfil == 2 || $id_perfil == 3)
        {
            $menu = $menu . "<li><a href='" . base_url() . "' class='active'><i class='fa fa-home sidebar-nav-icon'></i><span class='sidebar-nav-mini-hide'>Home</span></a></li>";
            $menu = $menu . "<li><a href='" . base_url() . "empresa' class='active'><i class='fa fa-bank sidebar-nav-icon'></i></i><span class='sidebar-nav-mini-hide'>Empresas</span></a></li>";

            $menu = $menu . "<li><a href='" . base_url() . "replicar' class='active'><i class='fa fa-superscript sidebar-nav-icon'></i></i><span class='sidebar-nav-mini-hide'>Replicar</span></a></li>";

            $menu = $menu . "<li><a href='" . base_url() . "pedido' class='active'><i class='fa fa-shopping-bag sidebar-nav-icon'></i></i><span class='sidebar-nav-mini-hide'>Pedido</span></a></li>";

            $menu = $menu . "<li><a href='" . base_url() . "faturamento' class='active'><i class='fa fa-credit-card sidebar-nav-icon'></i></i><span class='sidebar-nav-mini-hide'>Faturamento</span></a></li>";

            $menu = $menu . "<li><a href='" . base_url() . "pedido' class='active'><i class='fa fa-line-chart sidebar-nav-icon'></i></i><span class='sidebar-nav-mini-hide'>Contas Receber</span></a></li>";




            $menu = $menu . '<li>
            <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-cog sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Configuração</span></a>
            <ul>
                <li>
                    <a href="' . base_url() . '/banco">Banco</a>
                </li>
                
                <li>
                    <a href="'.base_url().'/cnae">Cnae</a>
                </li>
               
               
            </ul>
        </li>' ;
            

            /*
            foreach ($query->result() as $row) {

                if ($row->fl_unico == true) {

                    $menu = $menu . "<li><a href='" . base_url() . $row->action . "' class='active'><i class='" . $row->icone . " sidebar-nav-icon'></i><span class='sidebar-nav-mini-hide'>" . $row->titulo . "</span></a></li>";
                } else {
                    if ($row->id_pai == null) {

                        if ($id_menu <> 0) {
                            $id_menu = 0;
                            $menu = $menu . "</ul></li>";
                        }

                        $menu = $menu . "<li><a href='#' class='sidebar-nav-menu'><i class='fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide'></i><i class='" . $row->icone . " sidebar-nav-icon'></i><span class='sidebar-nav-mini-hide'>" . $row->titulo . "</span></a><ul>";
                    } else {
                        $id_menu = $row->id_pai;
                        $menu = $menu . "<li><a href='" . base_url() . $row->action . "'>" . $row->titulo . "</a></li>";
                    }
                }
            }*/
        }else
        {

            $menu = $menu . "<li><a href='" . base_url() . "' class='active'><i class='fa fa-home sidebar-nav-icon'></i><span class='sidebar-nav-mini-hide'>Home</span></a></li>";

            $menu = $menu . "<li><a href='" . base_url() . "diretorio/index/" . $_SESSION['id_empresa'] . "' class='active'><i class='fa fa-folder-open sidebar-nav-icon'></i><span class='sidebar-nav-mini-hide'>Arquivos</span></a></li>";

        }

        $menu = $menu . "</ul>";

        return $menu;
    }
}

