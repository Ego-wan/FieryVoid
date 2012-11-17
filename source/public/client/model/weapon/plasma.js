var Plasma = function(json, ship)
{
    Weapon.call( this, json, ship);
}
Plasma.prototype = Object.create( Weapon.prototype );
Plasma.prototype.constructor = Plasma;


var PlasmaAccelerator = function(json, ship)
{
    Plasma.call( this, json, ship);
}
PlasmaAccelerator.prototype = Object.create( Plasma.prototype );
PlasmaAccelerator.prototype.constructor = PlasmaAccelerator;


var MagGun = function(json, ship)
{
    Plasma.call( this, json, ship);
}
MagGun.prototype = Object.create( Plasma.prototype );
MagGun.prototype.constructor = MagGun;


var HeavyPlasma = function(json, ship)
{
    Plasma.call( this, json, ship);
}
HeavyPlasma.prototype = Object.create( Plasma.prototype );
HeavyPlasma.prototype.constructor = HeavyPlasma;


var MediumPlasma = function(json, ship)
{
    Plasma.call( this, json, ship);
}
MediumPlasma.prototype = Object.create( Plasma.prototype );
MediumPlasma.prototype.constructor = MediumPlasma;


var PlasmaStream = function(json, ship)
{
    Plasma.call( this, json, ship);
}
PlasmaStream.prototype = Object.create( Plasma.prototype );
PlasmaStream.prototype.constructor = PlasmaStream;

