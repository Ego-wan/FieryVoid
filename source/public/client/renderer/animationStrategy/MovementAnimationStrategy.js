window.MovementAnimationStrategy = (function(){

    function MovementAnimationStrategy(){
        AnimationStrategy.call(this);
        this.animatedMovements = {};
    }

    MovementAnimationStrategy.prototype = Object.create(AnimationStrategy.prototype);

    MovementAnimationStrategy.prototype.activate = function(shipIcons, turn, scene) {
        this.shipIconContainer = shipIcons;
        this.turn = turn;
        return this;
    };

    MovementAnimationStrategy.prototype.update = function(gamedata) {
        AnimationStrategy.prototype.update.call(this, gamedata);
        console.log("Animation startegy update");

        this.positionAndFaceAllIcons();
        buildAnimations.call(this);


        return this;
    };

    MovementAnimationStrategy.prototype.deactivate = function(scene) {
        return this;
    };

    MovementAnimationStrategy.prototype.render = function(){
        AnimationStrategy.prototype.render.call(this);
    };

    function buildAnimations() {
        this.shipIconContainer.getArray().forEach(function(icon) {

            if (this.animations.some(function (animation) { return animation.shipIcon === icon})) {
                return;
            }

            this.animations.push(new ShipMovementAnimation(icon, this.turn));
        }, this)
    }

    return MovementAnimationStrategy;
})();