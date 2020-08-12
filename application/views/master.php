
<?php


if ($_SESSION['nome'] == null) {
    redirect('/home/login', 'refresh');
} else {

    $this->load->view('header');
    $this->load->view($view);
    $this->load->view('footer');
}
