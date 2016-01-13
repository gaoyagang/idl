<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        echo '<pre>';
        // print_r(Requests::register_autoloader());
        $wx = new Weixin('AddressBook');

        $x = $wx -> getToken('wx4091606e5fc6e45c', 'eYNyP1ky4U-1f-91JVv55_f7-JGv-_UzIrxOfVVCqo1cOtCucsg0Uw4P_nJvKdqf');
        print_r($x);
        exit();
        
    }

}

