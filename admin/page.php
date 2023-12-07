<?php

    /* 
        categories => [ Manage | Edit | Update | Add | Insert | Delete | Stats]
        for every categortis have 7 page 
        we have 12 categortis page 
        12 * 7 = 90
    */

    $do =  isset($_GET['do']) ? $_GET['do'] : 'manage';
    if ($do == 'manage') echo 'welconm to manage page ';
    elseif ($do == 'add') echo 'welconm to add page ';
    elseif ($do == 'dell') echo 'welconm to dell page ';
    else echo 'Erorr no page with this page  ' . $do;


    last video 
    https://www.youtube.com/watch?v=YtXNFXHuGZ4&list=PLDoPjvoNmBAxdiBh6J62wOzEnvC4CNuFU&index=27