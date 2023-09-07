<?php
      $do = isset($_GET['page_layout']) ? $_GET['page_layout'] : "home";
      if($do =='timkiemphim')
      {
            $do = 'timkiemphim';
      }
      include $do . ".php";     
?>