(function (d, w) {
    var map = d.querySelector('#map');
    var context = map.getContext('2d');

    for(var x = 0; x <= 10; x++){
        for(var y = 0; y <= 10; y++){
            context.strokeStyle = "black";
            context.strokeRect(x*50, y*50, 50, 50);
        }
    }

    var characterA = new Image();
        characterA.src ='images/characterA.png';
        characterA.addEventListener('load', function(){
            context.drawImage(characterA, 0, 50);
        }, false);

    var characterB = new Image();
        characterB.src ='images/characterB.png';
        characterB.addEventListener('load', function(){
            context.drawImage(characterB, 50, 0);
        }, false);
})(document, window);
