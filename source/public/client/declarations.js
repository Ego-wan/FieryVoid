<script>
  var GlobalSide = '';
  var GlobalContent = '';
  var GlobalDisplay = '';

  //resets EW and re-displays
  function doResetEW(shipID){
    ew.resetEW(shipID);
    fillDeclarationsActual();
  }
  
  //reads appropriate EW declarations into table
  function readDeclarationsEW(){
    var dispShips = new Array(); 
    var dispShip = {id: 0, name: '', class: '', value: '', EW: new Array() };
    var dispEWEntry = {name: '', targetName: '', targetClass: '', value: 0};
    
    for (var i in gamedata.ships){
      var ship = gamedata.ships[i];
      if( (globalSide=='Own' && GlobalDisplay=='Source' && gamedata.isMyShip(ship)) //own ship, own ew, by source
        || (globalSide!='Own' && GlobalDisplay=='Source' && !gamedata.isMyShip(ship)) //enemy ship, enemy EW, by source
        || (globalSide=='Own' && GlobalDisplay!='Source' && !gamedata.isMyShip(ship)) //enemy ship, own ew, by target
        || (globalSide!='Own' && GlobalDisplay!='Source' && gamedata.isMyShip(ship)) //own ship, enemy EW, by target
      ){
        dispShip.id = ship.id;
        dispShip.name = ship.name;
        dispShip.class = ship.shipClass;
        dispShip.value = ship.pointCost;
        dispShip.EW = new Array();
        //now all EW entries...either own or incoming!
        if (ship.flight){//for fighters, show jinking in all circumstances
          dispEWEntry.name = 'jinking';
          dispEWEntry.targetName = '';
          dispEWEntry.targetClass = '';
          dispEWEntry.value = shipManager.movement.getJinking(ship);
          dispShip.EW.push(dispEWEntry);
        }else{//for ships, show DEW in all circumstances
          dispEWEntry.name = 'DEW';
          dispEWEntry.targetName = '';
          dispEWEntry.targetClass = '';
          dispEWEntry.value = ew.getDefensiveEW(ship);
          dispShip.EW.push(dispEWEntry);
        }
        if(GlobalDisplay=='Source'){ //by source - display EW dished out by self!
          if (!ship.flight){ //fighters do not emit any EW            
            for (var e in ship.EW) {
              var EWentry = ship.EW[e];
              dispEWEntry.name = EWentry.type;
              dispEWEntry.value = EWentry.amount;
              if (EWentry.targetid>0){
                var targetUnit = gamedata.getShip(EWentry.targetid);
                dispEWEntry.targetName = targetUnit.name;
                dispEWEntry.targetClass = targetUnit.shipClass;
              }else{//targetless EW                
                dispEWEntry.targetName = '';
                dispEWEntry.targetClass = '';
              }              
              dispShip.EW.push(dispEWEntry);
            }
          }
        }else{ //by target - display EW dished out at self BY OPPONENT! (for fighters - CCEW)
          for (var j in gamedata.ships){
            var srcShip = gamedata.ships[j]; 
            if (srcShip.team != ship.team){ //enemy ships only
              for (var e in srcShip.EW) {
                var EWentry = srcShip.EW[e];
                if(EWEntry.targetID == ship.id //self is target
                  || (ship.flight && EWEntry.type == 'CCEW') //self is fighter and EWentry is CCEW
                ){
                  dispEWEntry.name = EWentry.type;
                  dispEWEntry.value = EWentry.amount;
                  dispEWEntry.targetName = srcShip.name; //source, in this case
                  dispEWEntry.targetClass = srcShip.shipClass;
                }
              }
            }
          }
        }
        dispShips.push(dispShip);
      }
    }
    
    //sort ships by value
		dispShips.sort(function(a, b){
			if (a.flight && !b.flight){//fighters always after ships
				return -1;
      }elseif (!a.flight && b.flight){
        return 1;
			}elseif (a.value > b.value){ //more valuable units first
        return 1;
      }elseif (a.value < b.value){
        return -1;
			}
			else return 0;
		});
    
    var txt = '';
    //change to text
    for (var i in dispShips){
      var shpEntry = dispShips[i];
      txt += '<b>' + shpEntry.name + ' (' + shpEntry.class + ') ' + '</b>';
      //reset EW button - for own ships
      if ( gamedata.gamephase == 1 && globalSide=='Own' && GlobalDisplay=='Source') {//Initial phase, displaying own ships
        if (shpEntry.EW.count > 1 ){ //has something besides DEW!
          txt += '<input type="button" value="Reset EW" onclick="doResetEW(' + shpEntry.id + ');">';
        }
      }
      txt += '<br>';
      
    }
    
    return txt;
  }//endof function readDeclarationsEW
  
  
  //writes actual content to declarationsActual div
  function fillDeclarationsActual() {
    //fix data (if not done yet)
    if(GlobalSide=='') GlobalSide = 'Own';
    if(GlobalContent=='') GlobalContent = 'EW';
    if(GlobalDisplay=='') GlobalDisplay = 'Source';
    
    //prepare data (actually text!)
    var srcData = array();
    if(globalContent=='EW'){
      srcData = readDeclarationsEW();
    }else{
      
    }
    
    //prepare text
    var newText = '';
    //start with header
    newText = '<b><u>';
    newText += GlobalSide + ' ' + GlobalContent + ' by ' + GlobalDisplay;
    newText += '</b></u><br>';
    //actual data
    newText += srcData;
    
    //display text
    var targetDiv = $(".declarationsActual");
    targetDiv.html = newText;
  } //endof function fillDeclarationsActual
  

  function callOwn() {
    GlobalSide = 'Own';
    fillDeclarationsActual();
  }  
  function callEnemy() {
    GlobalSide = 'Enemy';
    fillDeclarationsActual();
  }    
  function callEW() {
    GlobalContent = 'EW';
    fillDeclarationsActual();
  }      
  function callFire() {
    GlobalContent = 'Fire';
    fillDeclarationsActual();
  }  
  function callSource() {
    GlobalDisplay = 'Source';
    fillDeclarationsActual();
  }    
  function callTarget() {
    GlobalDisplay = 'Target';
    fillDeclarationsActual();
  }    
  
</script>
