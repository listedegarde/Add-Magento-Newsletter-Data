<?php
class Custom_Newsletter_Model_Observer extends Varien_Event_Observer
{
  public function __construct(){
  }
  
  public function newsletterSubscriberSave($observer){
    $subscriber = $observer->getEvent()->getSubscriber();
    $country = (string) $this->getRequest()->getPost('country_id');
    $zone = (string) $this->getRequest()->getPost('zone');

    $subscriber->setCountry($country);
    $subscriber->setZone($zone);
	
    $subscriber->save();
    return $this;
  }
}