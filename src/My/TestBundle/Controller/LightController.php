<?php

namespace My\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use My\TestBundle\Light\LightSwitch;

class LightController extends Controller
{
    protected $lightSwitch;

    public function __construct(LightSwitch $lightSwitch)
    {
        $this->lightSwitch = $lightSwitch;
    }

    public function switchAction($switch)
    {        
        if($switch === "on") {
            $this->lightSwitch->on();
        } else {
            $this->lightSwitch->off();
        }
        
        return $this->redirect($this->generateUrl('light_status'), 301);
    }
    
    public function statusAction()
    {
        return $this->render('MyTestBundle:Light:status.html.twig', array('status' => $this->lightSwitch->getStatus()));
    }
}
