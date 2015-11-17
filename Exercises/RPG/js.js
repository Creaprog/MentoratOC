(function (d, w) {
    var map = d.querySelector('#map');
    var context = map.getContext('2d');
    var round = 0;
    var fightMode = 0;
    var playerTable = [];
    var gameZone = d.getElementById('game');
    var log, title, titleText, description, descriptionText, welcome, welcomeText, playerStat, playerName, space, spaceTwo, spaceTree, life, lifeValue, weaponName, damageWeapon, selectWeapon, selectWeaponDamage, stepText, spaceStep, selectStep;


    /**
     * The world contains the characters and different weapons
     * @constructor
     */
    var World = function(){
        this.createMap();
    };

    World.prototype.characters = [];
    World.prototype.weapons = [];

    World.prototype.collides = function(element)  {
        var x = element.x,
            y = element.y,
            nameToCheck = element.nick || element.name || null,
            char, weapon,
            i, l;

        for (i = 0, l = this.characters.length; i < l; i++) {
            char = this.characters[i];
            if (x === char.x && y === char.y && char.nick !== nameToCheck) {
                return true;
            }
        }

        for (i = 0, l = this.weapons.length; i < l; i++) {
            weapon = this.weapons[i];
            if (x === this.weapons[i].x && y === this.weapons[i].y && weapon.name !== nameToCheck) {
                return true;
            }
        }

        return false;
    };

    function fightEngine(character){
        if(isCombat(character)){
            console.info('en combat');
            fightMode = 1;
            createFightText();
                /* Greg */
                var fight = d.getElementById('fightGreg');
                fight.addEventListener('click', function(){
                    Emilie.life = Emilie.life - Greg.weapon.damage;
                    var lifeE = d.getElementById('lifeEmilie');
                    lifeE.value = Emilie.life;
                });

                /* Emilie */
                var fight2 = d.getElementById('fightEmilie');
                fight2.addEventListener('click', function(){
                    Greg.life = Greg.life - Emilie.weapon.damage;
                    var lifeG = d.getElementById('lifeGreg');
                    lifeG.value = Greg.life;
                });

        }else{
            console.info('pas de combats');
        }
    }

   function createFightText(){
        var body = d.getElementById('log'), player, brP, brP2, defend, fight;
        for(var i = 0, o = playerTable.length; i < o; i++){
            player = d.getElementById('data' + playerTable[i].nick);
            brP = d.createElement('br');
            player.appendChild(brP);
            fight = d.createElement('input');
            fight.id = 'fight' + playerTable[i].nick;
            fight.type = 'button';
            fight.name = 'fight';
            fight.value = 'Attaquer';
            player.appendChild(fight);
            brP2 = d.createElement('br');
            player.appendChild(brP2);
            defend = d.createElement('input');
            defend.type = 'button';
            defend.name = 'defend';
            defend.value = 'Defendre';
            player.appendChild(defend);
            body.appendChild(player);
        }
    }

    /**
     *
     * @param element
     * @param randomPosition
     * @returns {World}
     */
    World.prototype.addElement = function(element, randomPosition) {
        randomPosition = !!randomPosition;
        var position;
        var limit = (this.weapons.length + this.characters.length) * 2 || 50;
        var i = 0, l;
        var nameToCheck = element.nick || element.name || null;
        var char, weapon;

        for (i = 0, l = this.characters.length; i < l; i++) {
            char = this.characters[i];
            if (char.nick === nameToCheck) {
                throw Error('Name "'+nameToCheck+'" already exists in the game.');
            }
        }

        for (i = 0, l = this.weapons.length; i < l; i++) {
            weapon = this.weapons[i];
            if (weapon.name === nameToCheck) {
                throw Error('Name "'+nameToCheck+'" already exists in the game.');
            }
        }

        if (randomPosition) {
            i = 0;
            do {
                position = {
                    x: this.aleaPosition(),
                    y: this.aleaPosition()
                };
                i++;
            } while (this.collides(position) && i < limit);

            if (i >= limit) {
                throw Error('It seems your world is full...');
            }

            element.x = position.x;
            element.y = position.y;
        }

        if (element.isCharacter) {
            this.characters.push(element);
        } else if (element.isWeapon) {
            this.weapons.push(element);
        } else {
            throw Error('What kind of element did you want to add to the world?');
        }

        element.image.src = element.src;
        element.image.addEventListener('load', function(){
            context.drawImage(element.image, element.x, element.y);
        }, false);

        return this;
    };


    World.prototype.aleaPosition = function() {
        return Math.floor(Math.random() * (10 - 1)) * 50;
    };

    World.prototype.createMap = function(){
        for(var x = 0; x <= 10; x++){
            for(var y = 0; y <= 10; y++){
                context.strokeStyle = "black";
                context.strokeRect(x*50, y*50, 50, 50);
            }
        }
    };

    World.prototype.drawElement = function(element){
        element.image.src = element.src;
        element.image.addEventListener('load', function(){
            context.drawImage(element.image, element.x, element.y);
        }, false);
    };

    World.prototype.updateStep = function (character){
        selectStep = d.getElementById('step' + character.nick);
        selectStep.innerText = 'Déplacement restant : ' + character.step;
    };
    // TO BE REMOVED IN THE END
    var aleaPosition = World.prototype.aleaPosition;

    //Constructor of characters
    function Character(nick, x, y, src, weapon) {
        this.isCharacter = true;
        this.nick = nick;
        this.x = x;
        this.y = y;
        this.life = 100;
        this.weapon = weapon;
        this.src = src;
        this.image = new Image();
        this.step = 3;
        this.clear = 1;
        this.oldWeapon = null;

        this.setWeapon = function(weapon){
            this.weapon = weapon;
            weapon.x = this.x;
            weapon.y = this.y;
        };

        this.move = function (direction) {
            var valid = {
                    'up':    { attribute: 'y', value: -50},
                    'down':  { attribute: 'y', value:  50},
                    'left':  { attribute: 'x', value: -50},
                    'right': { attribute: 'x', value:  50}
                },
                modificators = valid[direction];

            if (!valid[direction]) {
                throw Error('Direction not valid. Must be one of "up", "down", "left" or "right".');
            }

            console.info(this.nick+' moves '+direction);

            clearContext(this.x, this.y);
            if (this.clear !== 1) {
                world.drawElement(this.oldWeapon);
            }
            this[modificators.attribute] = this[modificators.attribute] + modificators.value;
            if (catchWeapon(this)) {
                this.weapon.onTheMap(this.x, this.y);
                this.oldWeapon = this.weapon;
                this.weapon = returnWeaponCatch(this);
                updateWeaponText(this);
                world.drawElement(this);
                this.clear = 0;
            } else {
                this.weapon[modificators.attribute] = this.weapon[modificators.attribute] + modificators.value;
                move(this, this.weapon);
                this.clear = 1;
            }


        };
        /**
         * @param character Character
         * @returns {boolean}
         */
        var catchWeapon = function(character) {
            return (character.x == baton.x        && character.y == baton.y)
                || (character.x == gun.x          && character.y == gun.y)
                || (character.x == dagger.x       && character.y == dagger.y)
                || (character.x == weapDefaultA.x && character.y == weapDefaultA.y)
                || (character.x == weapDefaultB.x && character.y == weapDefaultB.y)
            ;
        };

        this.moveUp = function () {
            if (this.y == 0) {
                this.step++;
                console.log('vous ne pouvez pas aller dans cette direction');
            } else {
                this.move('up');
            }
        };

        this.moveDown = function () {
            if (this.y == 450) {
                this.step++;
                console.log('vous ne pouvez pas aller dans cette direction');
            } else {
                this.move('down');
            }
        };

        this.moveRight = function () {
            if (this.x == 450) {
                this.step++;
                console.log('vous ne pouvez pas aller dans cette direction');
            } else {
                this.move('right');
            }
        };

        this.moveLeft = function () {
            if (this.x == 0) {
                this.step++;
                console.log('vous ne pouvez pas aller dans cette direction');
            } else {
                this.move('left');
            }
        };


    }

    //Constructor of weapons
    function Weapon(name, damage, src){
        this.isWeapon = true;
        this.name = name;
        this.damage = damage;
        this.x = aleaPosition();
        this.y = aleaPosition();
        this.src = src;
        this.image = new Image();


        this.onTheMap = function(cordx, cordy){
            this.x = cordx;
            this.y = cordy;
            world.drawElement(this);
        };
    }

    function move(character){
        var weapon = character.weapon;
        delete character.image;
        character.image = new Image();
        character.image.src = character.src;
        character.image.addEventListener('load', function(){
            context.drawImage(character.image, character.x, character.y);
        }, false);
        weapon.image.src = weapon.src;
        weapon.image.addEventListener('load', function(){
            context.drawImage(weapon.image, weapon.x, weapon.y)
        }, false);
    }

    function isCombat(character){
        for(var i = 0, o = playerTable.length; i < o; i++){
            if(playerTable[i].nick != character.nick){
                if(character.y == playerTable[i].y + 50 && character.x == playerTable[i].x){
                    return true
                }else if(character.y == playerTable[i].y - 50 && character.x == playerTable[i].x){
                    return true
                }else if(character.x == playerTable[i].x - 50 && character.y == playerTable[i].y){
                    return true
                }else if(character.x == playerTable[i].x + 50 && character.y == playerTable[i].y){
                    return true
                }
            }
            else{
                return false
            }
        }
    }

    function returnWeaponCatch(character){
        if(character.x == baton.x && character.y == baton.y && character.weapon.name != baton.name){
            return baton
        }else if(character.x == gun.x && character.y == gun.y && character.weapon.name != gun.name){
            return gun
        }else if(character.x == dagger.x && character.y == dagger.y && character.weapon.name != dagger.name){
            return dagger
        }else if(character.x == weapDefaultA.x && character.y == weapDefaultA.y && character.weapon.name != weapDefaultA.name){
            return weapDefaultA
        }else if(character.x == weapDefaultB.x && character.y == weapDefaultB.y && character.weapon.name != weapDefaultB.name){
            return weapDefaultB
        }
        else {
            return null
        }
    }

    function createText(){
        log = d.createElement('div');
        log.id = 'log';
        title = d.createElement('h1');
        titleText = d.createTextNode('Rpg game');

        title.appendChild(titleText);
        log.appendChild(title);

        description = d.createElement('p');
        descriptionText = d.createTextNode("Bienvenue sur ce mini Rpg le but est simple : vous devez vaincre votre adversaire pour cela vous pouvez les différentes armes sur la carte de jeux. Lorsque vous vous retrouver a coter de votre adversaire un combat a mort débuttera, vous aurez alors deux possibilité la première attaquer et la seconde defencre si vous attaque vous infligerez a votre adversaire les dégats complet, si vous choissisez de vous défendre alors vous ne pourrer pas attque pendant votre tour mais vous prendrer la moitier des dégats de l'arme de votre adversaire.");

        description.appendChild(descriptionText);
        log.appendChild(description);

        welcome = d.createElement('h2');
        welcomeText = d.createTextNode('Que le combat commence !');

        welcome.appendChild(welcomeText);
        log.appendChild(welcome);

        for(var i = 0, o = playerTable.length; i < o; i++){
            playerStat = d.createElement('p');
            playerStat.id = 'data' + playerTable[i].nick;
            playerName = d.createTextNode(playerTable[i].nick);

            playerStat.appendChild(playerName);
            space = d.createElement('br');
            playerStat.appendChild(space);

            life = d.createTextNode('life : ');
            playerStat.appendChild(life);

            lifeValue = d.createElement('progress');
            lifeValue.id = 'life' + playerTable[i].nick;
            lifeValue.value = playerTable[i].life;
            lifeValue.max = playerTable[i].life;

            playerStat.appendChild(lifeValue);

            weaponName = d.createElement('span');
            weaponName.id = 'weapon' + playerTable[i].nick;
            console.info(playerTable[i]);
            weaponName.innerText = 'Arme : ' + playerTable[i].weapon.name;


            spaceTwo = d.createElement('br');
            playerStat.appendChild(spaceTwo);

            playerStat.appendChild(weaponName);

            damageWeapon = d.createElement('span');
            damageWeapon.id = 'damage' + playerTable[i].nick;
            damageWeapon.innerText = 'Dégat de l\'arme : ' + playerTable[i].weapon.damage;
            spaceTree = d.createElement('br');
            playerStat.appendChild(spaceTree);
            playerStat.appendChild(damageWeapon);

            spaceStep = d.createElement('br');
            playerStat.appendChild(spaceStep);

            stepText = d.createElement('span');
            stepText.id = 'step' + playerTable[i].nick;
            stepText.innerText = 'Déplacement restant : '+ playerTable[i].step;
            playerStat.appendChild(stepText);


            log.appendChild(playerStat);

        }

        gameZone.insertBefore(log, map);
    }

    function updateWeaponText(character){
        selectWeapon = d.getElementById('weapon' + character.nick);
        selectWeapon.innerText = 'Arme : ' + character.weapon.name;
        selectWeaponDamage = d.getElementById('damage' + character.nick);
        selectWeaponDamage.innerText = 'Dégat de l\'arme : ' + character.weapon.damage;
    }


    function clearContext(x, y){
        context.clearRect(x, y, 50, 50);
        context.strokeStyle = "black";
        context.strokeRect(x, y, 50, 50);
    }

    function manageStep(character){
        if(character.step > 0){
            return true;
        }else if(character.step == 0){
            character.step = 3;
            if(round == 0){
                round = 1;
            }else{
                round = 0;
            }
            return false;
        }
    }

    function moveCharacters(){
        d.addEventListener('keydown', function(e){
            if(e.keyCode == 38){
                if(fightMode == 0){
                    if(round == 0) {
                        if (manageStep(Greg)) {
                            Greg.moveUp();
                            Greg.step--;
                            world.updateStep(Greg);
                            fightEngine(Emilie);
                        }else {
                            Emilie.moveUp();
                            Emilie.step --;
                            world.updateStep(Emilie);
                            fightEngine(Emilie);

                        }
                    }
                    else{
                        if (manageStep(Emilie)) {
                            Emilie.moveUp();
                            Emilie.step--;
                            world.updateStep(Emilie);
                            fightEngine(Emilie);
                        }else {
                            Greg.moveUp();
                            Greg.step--;
                            world.updateStep(Greg);
                            fightEngine(Greg);
                        }
                    }
                }else{
                    console.info('vous ne pouvez pas fuir');
                }


            }else if(e.keyCode == 40){
                if(fightMode == 0){
                    if(round == 0) {
                        if (manageStep(Greg)) {
                            Greg.moveDown();
                            Greg.step--;
                            world.updateStep(Greg);
                            fightEngine(Emilie);
                        }else {
                            Emilie.moveDown();
                            Emilie.step --;
                            world.updateStep(Emilie);
                            fightEngine(Emilie);
                        }
                    }
                    else{
                        if (manageStep(Emilie)) {
                            Emilie.moveDown();
                            Emilie.step--;
                            world.updateStep(Emilie);
                            fightEngine(Emilie);
                        }else {
                            Greg.moveDown();
                            Greg.step--;
                            world.updateStep(Greg);
                            fightEngine(Greg);
                        }
                    }
                }else{
                    console.info('vous ne pouvez pas fuir');
                }

            }else if(e.keyCode == 39){
                if(fightMode == 0){
                    if(round == 0) {
                        if (manageStep(Greg)) {
                            Greg.moveRight();
                            Greg.step--;
                            world.updateStep(Greg);
                            fightEngine(Emilie);
                        }else {
                            Emilie.moveRight();
                            Emilie.step --;
                            world.updateStep(Emilie);
                            fightEngine(Greg);
                        }
                    }
                    else{
                        if (manageStep(Emilie)) {
                            Emilie.moveRight();
                            Emilie.step--;
                            world.updateStep(Emilie);
                            fightEngine(Emilie);
                        }else {
                            Greg.moveRight();
                            Greg.step--;
                            world.updateStep(Greg);
                            fightEngine(Greg);
                        }
                    }
                }else{
                    console.info('vous ne pouvez pas fuir');
                }


            }else if(e.keyCode == 37){
                if(fightMode == 0){
                    if(round == 0) {
                        if (manageStep(Greg)) {
                            Greg.moveLeft();
                            Greg.step--;
                            world.updateStep(Greg);
                            fightEngine(Emilie);
                        }else {
                            Emilie.moveLeft();
                            Emilie.step --;
                            world.updateStep(Emilie);
                            fightEngine(Greg);
                        }
                    }
                    else{
                        if (manageStep(Emilie)) {
                            Emilie.moveLeft();
                            Emilie.step--;
                            world.updateStep(Emilie);
                            fightEngine(Emilie);
                        }else {
                            Greg.moveLeft();
                            Greg.step--;
                            world.updateStep(Greg);
                            fightEngine(Greg);
                        }
                    }
                }else{
                    console.info('vous ne pouvez pas fuir');
                }

            }
        })
    }

    //Weapon creation
    var weapDefaultA = new Weapon('swordA', 10, 'images/weaponC.png');
    var weapDefaultB = new Weapon('swordB', 10, 'images/weaponC.png');
    var baton = new Weapon('baton', 20, 'images/weaponD.png');
    var dagger = new Weapon('dagger', 15, 'images/weaponA.png');
    var gun = new Weapon('gun', 30, 'images/weaponB.png');

    //Character creation
    var Greg = new Character('Greg', 0, 0, 'images/characterA.png');
    var Emilie = new Character('Emilie', 0, 0, 'images/characterB.png');

    var world = new World();

    world
        .addElement(Greg, true)
        .addElement(Emilie, true)
        .addElement(weapDefaultA, true)
        .addElement(weapDefaultB, true)
        .addElement(baton, true)
        .addElement(dagger, true)
        .addElement(gun, true)
    ;
    w.world = world;
    playerTable.push(Greg);
    playerTable.push(Emilie);
    Greg.setWeapon(weapDefaultA);
    Emilie.setWeapon(weapDefaultB);
    createText();
    moveCharacters();
})(document, window);

/*
Game
    World
    Characters[]
        .world
        .weapon
    Weapons[]
*/
