(function (d, w) {
    var map = d.querySelector('#map');
    var context = map.getContext('2d');
    var round = 0;
    var playerTable = [];

    //Map creation
    function createMap(){
        for(var x = 0; x <= 10; x++){
            for(var y = 0; y <= 10; y++){
                context.strokeStyle = "black";
                context.strokeRect(x*50, y*50, 50, 50);
            }
        }
    }

    //Constructor of characters
    function Character(nick, x, y, src, weapon){
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

        this.moveUp = function(){
            if(this.y == 0){
                this.step++;
                console.log('vous ne pouvez pas aller dans cette direction');
            }else{
                if(this.clear == 1){
                    clearContext(this.x, this.y);
                    this.y = this.y - 50;
                    if(catchWeapon(this)){
                        this.weapon.onTheMap(this.x, this.y);
                        this.oldWeapon = this.weapon;
                        this.weapon = returnWeaponCatch(this);
                        addToGame(this);
                        this.clear = 0;
                    }else {
                        this.weapon.y = this.weapon.y - 50;
                        move(this, this.weapon);
                        this.clear = 1;
                    }
                }else {
                    clearContext(this.x , this.y);
                    addToGame(this.oldWeapon);
                    this.y = this.y - 50;
                    if(catchWeapon(this)){
                        this.weapon.onTheMap(this.x, this.y);
                        this.oldWeapon = this.weapon;
                        this.weapon = returnWeaponCatch(this);
                        addToGame(this);
                        this.clear = 0;
                    }else {
                        this.weapon.y = this.weapon.y - 50;
                        move(this, this.weapon);
                        this.clear = 1;
                    }
                }
            }
        };

        this.moveDown = function() {
            if(this.y == 450){
                this.step++;
                console.log('vous ne pouvez pas aller dans cette direction');
            }else {
                if(this.clear == 1){
                    clearContext(this.x, this.y);
                    this.y = this.y + 50;
                    if(catchWeapon(this)){
                        this.weapon.onTheMap(this.x, this.y);
                        this.oldWeapon = this.weapon;
                        this.weapon = returnWeaponCatch(this);
                        addToGame(this);
                        this.clear = 0;
                    }else {
                        this.weapon.y = this.weapon.y + 50;
                        move(this, this.weapon);
                        this.clear = 1;
                    }
                }else {
                    clearContext(this.x , this.y);
                    addToGame(this.oldWeapon);
                    this.y = this.y + 50;
                    if(catchWeapon(this)){
                        this.weapon.onTheMap(this.x, this.y);
                        this.oldWeapon = this.weapon;
                        this.weapon = returnWeaponCatch(this);
                        addToGame(this);
                        this.clear = 0;
                    }else {
                        this.weapon.y = this.weapon.y + 50;
                        move(this, this.weapon);
                        this.clear = 1;
                    }
                }
            }
        };

        this.moveRight = function(){
            if(this.x == 450){
                this.step++;
                console.log('vous ne pouvez pas aller dans cette direction');
            }else{
                if(this.clear == 1){
                    clearContext(this.x, this.y);
                    this.x = this.x + 50;
                    if(catchWeapon(this)){
                        this.weapon.onTheMap(this.x, this.y);
                        this.oldWeapon = this.weapon;
                        this.weapon = returnWeaponCatch(this);
                        addToGame(this);
                        this.clear = 0;
                    }else {
                        this.weapon.x = this.weapon.x + 50;
                        move(this, this.weapon);
                        this.clear = 1;
                    }
                }else {
                    clearContext(this.x , this.y);
                    addToGame(this.oldWeapon);
                    this.x = this.x + 50;
                    if(catchWeapon(this)){
                        this.weapon.onTheMap(this.x, this.y);
                        this.oldWeapon = this.weapon;
                        this.weapon = returnWeaponCatch(this);
                        addToGame(this);
                        this.clear = 0;
                    }else {
                        this.weapon.x = this.weapon.x + 50;
                        move(this, this.weapon);
                        this.clear = 1;
                    }
                }
            }
        };

        this.moveLeft = function(){
            if(this.x == 0){
                this.step++;
                console.log('vous ne pouvez pas aller dans cette direction');
            }else{
                if(this.clear == 1){
                    clearContext(this.x, this.y);
                    this.x = this.x - 50;
                    if(catchWeapon(this)){
                        this.weapon.onTheMap(this.x, this.y);
                        this.oldWeapon = this.weapon;
                        this.weapon = returnWeaponCatch(this);
                        addToGame(this);
                        this.clear = 0;
                    }else {
                        this.weapon.x = this.weapon.x - 50;
                        move(this, this.weapon);
                        this.clear = 1;
                    }
                }else {
                    clearContext(this.x , this.y);
                    addToGame(this.oldWeapon);
                    this.x = this.x - 50;
                    if(catchWeapon(this)){
                        this.weapon.onTheMap(this.x, this.y);
                        this.oldWeapon = this.weapon;
                        this.weapon = returnWeaponCatch(this);
                        addToGame(this);
                        this.clear = 0;
                    }else {
                        this.weapon.x = this.weapon.x - 50;
                        move(this, this.weapon);
                        this.clear = 1;
                    }
                }
            }
        };
    }

    //Constructor of weapons
    function Weapon(name, damage, src){
        this.name = name;
        this.damage = damage;
        this.x = aleaPosition();
        this.y = aleaPosition();
        this.src = src;
        this.image = new Image();

        this.sendTo = function(character){
            character.weapon = this;
            this.x = character.x;
            this.y = character.y;
        };

        this.onTheMap = function(cordx, cordy){
            this.x = cordx;
            this.y = cordy;
            addToGame(this);
        };
    }

    //Core
    function addToGame(character){
        character.image.src = character.src;
        character.image.addEventListener('load', function(){
            context.drawImage(character.image, character.x, character.y);
        }, false);
    }

    function move(character, weapon){
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
                    console.log('Vous etes en combats');
                }else if(character.y == playerTable[i].y - 50 && character.x == playerTable[i].x){
                    console.log('Vous etes en combats');
                }else if(character.x == playerTable[i].x - 50 && character.y == playerTable[i].y){
                    console.log('Vous etes en combats');
                }else if(character.x == playerTable[i].x + 50 && character.y == playerTable[i].y){
                    console.log('Vous etes en combats');
                }
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

    function catchWeapon(character){
        if(character.x == baton.x && character.y == baton.y){
            return true
        }else if(character.x == gun.x && character.y == gun.y){
            return true
        }else if(character.x == dagger.x && character.y == dagger.y){
            return true
        }else if(character.x == weapDefaultA.x && character.y == weapDefaultA.y){
            return true
        }else if (character.x == weapDefaultB.x && character.y == weapDefaultB.y){
            return true
        }
        else {
            return false
        }
    }

    function aleaPosition(){
        return Math.floor(Math.random() * (10 - 1)) * 50;
    }

    function collision(character, character2){
        if(character.x == character2.x && character.y == character2.y){
            character.x = aleaPosition();
            character.y = aleaPosition();
            character2.x = aleaPosition();
            character2.y = aleaPosition();
        }
    }

    function collisionWeapon(){

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
                if(round == 0) {
                    if (manageStep(Greg)) {
                        Greg.moveUp();
                        Greg.step--;
                        isCombat(Greg);
                    }else {
                        Emilie.moveUp();
                        Emilie.step --;
                        isCombat(Emilie);
                    }
                }
                else{
                    if (manageStep(Emilie)) {
                        Emilie.moveUp();
                        Emilie.step--;
                        isCombat(Emilie);
                    }else {
                         Greg.moveUp();
                        Greg.step--;
                        isCombat(Greg);
                    }
                }

            }else if(e.keyCode == 40){
                if(round == 0) {
                    if (manageStep(Greg)) {
                        Greg.moveDown();
                        Greg.step--;
                        isCombat(Greg);
                    }else {
                         Emilie.moveDown();
                        Emilie.step --;
                        isCombat(Emilie);
                    }
                }
                else{
                    if (manageStep(Emilie)) {
                         Emilie.moveDown();
                         Emilie.step--;
                        isCombat(Emilie);
                    }else {
                        Greg.moveDown();
                        Greg.step--;
                        isCombat(Greg);
                    }
                }

            }else if(e.keyCode == 39){
                if(round == 0) {
                    if (manageStep(Greg)) {
                        Greg.moveRight();
                        Greg.step--;
                        isCombat(Greg);
                    }else {
                        Emilie.moveRight();
                        Emilie.step --;
                        isCombat(Emilie);
                    }
                }
                else{
                    if (manageStep(Emilie)) {
                        Emilie.moveRight();
                        Emilie.step--;
                        isCombat(Emilie);
                    }else {
                        Greg.moveRight();
                        Greg.step--;
                        isCombat(Greg);
                    }
                }

            }else if(e.keyCode == 37){
                if(round == 0) {
                    if (manageStep(Greg)) {
                        Greg.moveLeft();
                        Greg.step--;
                        isCombat(Greg);
                    }else {
                        Emilie.moveLeft();
                        Emilie.step --;
                        isCombat(Emilie);
                    }
                }
                else{
                    if (manageStep(Emilie)) {
                        Emilie.moveLeft();
                        Emilie.step--;
                        isCombat(Emilie);
                    }else {
                        Greg.moveLeft();
                        Greg.step--;
                        isCombat(Greg);
                    }
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
    var Greg = new Character('Greg', aleaPosition(), aleaPosition(), 'images/characterA.png');
    var Emilie = new Character('Emilie', aleaPosition(), aleaPosition(), 'images/characterB.png');

    //Add characters into playerTable
    playerTable.push(Greg);
    playerTable.push(Emilie);

    //Launch the game
    createMap();
    addToGame(Greg);
    addToGame(Emilie);
    collision(Greg, Emilie);
    weapDefaultA.sendTo(Greg);
    addToGame(weapDefaultA);
    weapDefaultB.sendTo(Emilie);
    addToGame(weapDefaultB);
    addToGame(baton);
    addToGame(dagger);
    addToGame(gun);
    collisionWeapon();
    moveCharacters();

})(document, window);
