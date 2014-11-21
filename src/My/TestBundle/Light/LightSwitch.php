<?php

namespace My\TestBundle\Light;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class LightSwitch {
    protected $session;

    public function __construct(SessionInterface $session) {
        $this->session = $session;
    }
    
    public function on() {        
        $this->session->set('light_switch', true);
    }
    
    public function off() {
        $this->session->set('light_switch', false);
    }
    
    public function getStatus() {
        if (!$this->session->has('light_switch')) {
            $this->session->set('light_switch', false);
        }
        return $this->session->get('light_switch');
    }
}