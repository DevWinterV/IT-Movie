<?php
      $do = isset($_GET['page_layout']) ? $_GET['page_layout'] : "listfilm";
      include $do . ".php";
?>