<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body

        // shorthand version for Kint::dump()
        d($this);
        //Kint_Debug::dump($this);

        // ... or you could do
        // dd($this);
        // which would stop script from executing after rendering results

        // much nicer and better alternative to debug_backtrace()
        Kint::trace();
    }
}

