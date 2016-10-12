<?php
	require_once("ShipClasses.php");
	
    class FighterFlight extends BaseShip{

        public $shipSizeClass = -1; //0:Light, 1:Medium, 2:Heavy, 3:Capital, 4:Enormous
        public $imagePath = "img/ships/null.png";
        public $iconPath, $shipClass;
        public $systems = array();
        public $agile = true;
        public $turncost;
        public $turndelaycost = 0;
        public $accelcost = 1;
        public $rollcost = 1;
        public $pivotcost = 1;
        public $currentturndelay = 0;
        public $iniative = "N/A";
        public $iniativebonus = 0;
        public $gravitic = false;
        public $phpclass;
        public $forwardDefense, $sideDefense;
        public $destroyed = false;
        public $pointCost = 0;
        public $faction = null;
        public $flight = true;
        public $hasNavigator = false;
        public $superheavy = false;
        public $flightSize = 1;
        protected $flightLeader = null;
        
        public $offensivebonus, $freethrust;
        public $jinkinglimit = 0;
        
        
        public $canvasSize = 200;

        public $fireOrders = array();
        
        //following values from DB
        public $id, $userid, $name, $campaignX, $campaignY;
        public $rolled = false;
        public $rolling = false;
        public $team;
        
        protected $dropOutBonus = 0;

        public $movement = array();
        
        function __construct($id, $userid, $name, $slot){
            $this->id = (int)$id;
            $this->userid = (int)$userid;
            $this->name = $name;
            $this->slot = $slot;

        }
        
        private $autoid = 1;
        
        public function getInitiativebonus($gamedata){
            $initiativeBonusRet = parent::getInitiativebonus($gamedata);
            
            if($this->hasNavigator){
                $initiativeBonusRet += 5;
            }
            
            return $initiativeBonusRet;
        }

        public function getDropOutBonus(){
            return $this->dropOutBonus;
        }
        
        public function getSystemById($id){
            foreach ($this->systems as $system){
                if ($system->id == $id){
                    return $system;
                }
                foreach ($system->systems as $fs){
					if ($fs->id == $id){
						return $fs;
					}
				}
            }
            
            return null;
        }
        
        
        public function getSystemByName($name){
			foreach ($this->systems as $fighter){
                
                foreach ($fighter->systems as $fs){
					if ($fs->name == $name){
						return $fs;
					}
				}
            }
		}
        
        public function getFighterBySystem($id){
			foreach ($this->systems as $fighter){
                
                foreach ($fighter->systems as $fs){
					if ($fs->id == $id){
						return $fighter;
					}
				}
            }
		}
        
        protected function addSystem($fighter, $loc = null){
            
            $fighter->id = $this->autoid;
            $fighter->location = sizeof($this->systems);
            
            $this->autoid++;
            $fighterSys = array();
            foreach ($fighter->systems as $system){
				
				$system->id  = $this->autoid;
				$this->autoid++;
				$fighterSys[$system->id] = $system;
			}
            $fighter->systems = $fighterSys;
            
            $this->systems[$fighter->id] = $fighter;
            
        
        }
		
        public function getPreviousCoPos(){
            $pos = $this->getCoPos();
            
            for ($i = sizeof($this->movement)-1; $i>=0; $i--){
                $move = $this->movement[$i];
                $pPos = $move->getCoPos();
                
                if ( $pPos["x"] != $pos["x"] || $pPos["y"] != $pos["y"])
                    return $pPos;
            }
            
            return $pos;
        }
        
        public function getDEW($turn){
            
            foreach ($this->EW as $EW){
                if ($EW->type == "DEW" && $EW->turn == $turn)
                    return $EW->amount;
            }
            
            return 0;
        
        }
        
        public function getOEW($target, $turn){
        
            foreach ($this->EW as $EW){
                if ($EW->type == "OEW" && $EW->targetid == $target->id && $EW->turn == $turn)
                    return $EW->amount;
            }
            
            return 0;
        }
        
        public function getFacingAngle(){
            $movement = null;
            
            foreach ($this->movement as $move){
                $movement = $move;
            }
        
            return $movement->getFacingAngle();
        }     
        

        public function getLocations(){
            $locs = array();
		$exampleFtr = $this->systems[0]; //whether still alive or not
		$health = $exampleFtr->maxhealth;

            $locs[] = array("loc" => 0, "min" => 330, "max" => 30, "profile" => $this->forwardDefense, "remHealth"=>$health,"armour"=> $exampleFtr->armour[0]);
            $locs[] = array("loc" => 0, "min" => 30, "max" => 150, "profile" => $this->sideDefense, "remHealth"=>$health,"armour"=> $exampleFtr->armour[2]);
            $locs[] = array("loc" => 0, "min" => 150, "max" => 210, "profile" => $this->forwardDefense, "remHealth"=>$health,"armour"=> $exampleFtr->armour[3]);
            $locs[] = array("loc" => 0, "min" => 210, "max" => 330, "profile" => $this->sideDefense, "remHealth"=>$health,"armour"=> $exampleFtr->armour[1]);

            return $locs;
        }
	    
       public function fillLocations($locs){ //for fighters, armour and health are already defined by getLocations
            return $locs;
        }

        
        public function getStructureSystem($location){
             return null;
        }
        
        public function getFireControlIndex(){
              return 0;
               
        }
        
        public function isDestroyed($turn = false){
        
            foreach($this->systems as $system){
                if (!$system->isDestroyed($turn = false) && !$system->isDisengaged($turn)){
                    return false;
                }
                
            }
            
            return true;
        }
        
        public function isPowerless(){
        
            return false;
        }
        
        
        public function getHitSystem($pos, $shooter, $fire, $weapon, $location = null){
        
                 //print("getHitSystem, location: $location ");
            $systems = array();
          
            foreach ($this->systems as $system){
                if (!$system->isDestroyed()){
					$systems[] = $system;
                }
                            
            } 
			
			if (sizeof($systems) == 0)
				return null;
					
			return $systems[(Dice::d(sizeof($systems)) -1)];
			
        
        }
        
        public function getAllFireOrders()
        {
            $orders = array();
            
            foreach ($this->systems as $fighter)
            {
                foreach ($fighter->systems as $system)
                {
                    $orders = array_merge($orders, $system->fireOrders);
                }
            }
            
            return $orders;
        }
             
    }
  
    class SuperHeavyFighter extends FighterFlight{
        public $superheavy = true;
                
        function __construct($id, $userid, $name, $slot){
            parent::__construct($id, $userid, $name, $slot);
        }
    }
?>
