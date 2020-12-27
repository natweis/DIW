<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

    interface Account
    {
        public function userupdate();

        public function changepassword();
    }
?>