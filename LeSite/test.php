<?php
        $TEST_REQ = 'SELECT COUNT(DISTINCT id_module_habitation) as module_habitation ,
         COUNT(DISTINCT id_module_gaz) as module_gaz ,
         COUNT(DISTINCT id_module_electricite) as module_electricite
         FROM container
         LEFT JOIN module_habitation ON module_habitation.id_container = container.id_container
         LEFT JOIN module_gaz ON module_gaz.id_container = container.id_container
         LEFT JOIN module_electricite ON module_electricite.id_container = container.id_container
         WHERE container.id_container = 3';

        $connQuery = new APP_BDD;
        if ($res = $connQuery->link->query($TEST_REQ))
        {
            foreach ($res as $key => $val) 
            {
                foreach ($val as $k => $v) {
                    if ($v > 0) {
                        ?>
                       <form action="DetailModule.php" method="post">
		<input type="hidden" id = "id_container" name = "id_container" value = "<?php $id_container ?>">
		<input type="hidden" id = "type_module" name = "type_module" value = "<?php $k ?>">
		<input type="hidden" id = "id_vue" name = "id_vue" value = "<?php $id_vue ?>">
                        <?php
                                       }
                    //print_r($v);
                }
            }
        }
        unset($connQuery);

        //print_r($res);


?>