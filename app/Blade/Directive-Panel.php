<?php
/**
 * Created by PhpStorm.
 * User: Abdul
 * Date: 20/03/2018
 * Time: 22:54
 */

use App\Blade;

/**
 *
 */


return [
    'panel' => function ($expression) {

        return "<?php 
            echo panel($expression);
        ?>";
    },

    'endPanel' => function () {
        return '<?php 
            echo endPanel() 
            ?>';
    }
];

