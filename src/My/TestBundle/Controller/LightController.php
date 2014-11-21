<?php

namespace My\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LightController extends Controller
{
    public function switchAction($switch)
    {
        $lightSwitch = $this->container->get('light_switch');
        
        if($switch === "on") {
            $lightSwitch->on();
        } else {
            $lightSwitch->off();
        }
        
        return $this->redirect($this->generateUrl('light_status'), 301);
    }
    
    public function statusAction()
    {
        $lightSwitch = $this->container->get('light_switch');
        return $this->render('MyTestBundle:Light:status.html.twig', array('status' => $lightSwitch->getStatus()));
    }
}
