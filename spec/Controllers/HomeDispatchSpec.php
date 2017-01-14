<?php

namespace AppSpec\Controllers;

use Config\App;
use CodeIgniter\CodeIgniter;
use CodeIgniter\Services;

describe('Home Dispatch', function () {

    beforeAll(function () {

        $this->codeIgniter = new CodeIgniter(
            memory_get_usage(),
            microtime(true),
            new App()
        );

    });

    describe('/', function () {

        it('shows home page', function () {

            $_SERVER['argv'] = [
    			__FILE__,
    			'/',
    		];
    		$_SERVER['argc'] = 2;

            ob_start();
            $this->codeIgniter->run();
            $actual = ob_get_clean();
            
            expect($actual)->toContain('Welcome to CodeIgniter');

        });

    });

});
