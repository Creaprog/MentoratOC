(function (d, w) {
    var body = d.getElementById('christmas_body'), foot = d.getElementById('christmas_foot');
    var branch, thorn, thorn2, trunk, wood;

    // A one single thorn at the up of the tree
    branch = d.createElement('p');
    thorn = d.createTextNode('▲');
    branch.appendChild(thorn);
    body.appendChild(branch);

    // declaration of max and incrementing
    for (var i = 1, max = 1; i < 25; i++, max++) {
        branch = d.createElement('p');

        // A regex for christmas tree's branch
        if (/5|10|15|20/.test(i)) {
            max -= 2;
        }

        for (var o = 1; o <= max; o++) {
            thorn = d.createTextNode('▲');
            thorn2 = d.createTextNode('▲');
            branch.appendChild(thorn);
            branch.appendChild(thorn2);
        }
        body.appendChild(branch);
    }

    for (var p = 0; p < 6; p++) {
        trunk = d.createElement('p');
        for (var q = 0; q < 6; q++) {
            wood = d.createTextNode('■');
            trunk.appendChild(wood);
        }
        foot.appendChild(trunk);
    }

})(document, window);
