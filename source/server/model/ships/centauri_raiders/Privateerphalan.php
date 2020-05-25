<?php
class Privateerphalan extends FighterFlight{
    
    function __construct($id, $userid, $name,  $slot){
        parent::__construct($id, $userid, $name,  $slot);
        
		$this->pointCost = 22*6;
        $this->faction = "Raiders";
        $this->phpclass = "Privateerphalan";
        $this->shipClass = "Centauri Privateer Phalan Assault Fighters";
		$this->imagePath = "img/ships/phalan.png";
		$this->isd = 1882;
		$this->variantOf = "Centauri Privateer Glaive Light Fighters";
		$this->occurence = "uncommon";
	    
		$this->notes = "Since 2012 available to all Raiders as common fighter.";
        
        $this->forwardDefense = 9;
        $this->sideDefense = 8;
        $this->freethrust = 9;
        $this->offensivebonus = 3;
        $this->jinkinglimit = 6;
        $this->turncost = 0.33;
        
		$this->iniativebonus = 80;
        $this->populate();
    }

    public function populate(){

        $current = count($this->systems);
        $new = $this->flightSize;
        $toAdd = $new - $current;

        for ($i = 0; $i < $toAdd; $i++){
			
		$armour = array(2, 1, 1, 1);
		$fighter = new Fighter("phalan", $armour, 12, $this->id);
		$fighter->displayName = "Phalan";
		$fighter->imagePath = "img/ships/phalan.png";
		$fighter->iconPath = "img/ships/phalan_large.png";


		$fighter->addFrontSystem(new PairedPlasmaBlaster(330, 30));
		//$fighter->addFrontSystem(new PlasmaGun(330, 30, 0));  
		$largeGun = new PlasmaGun(330, 30); 
		$largeGun->exclusive = true; 
		$fighter->addFrontSystem($largeGun);			

		$this->addSystem($fighter);

	}	
		
    }

}



?>
