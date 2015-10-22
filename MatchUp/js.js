(function (d,w) {
    var links = ['http://domain.com/path/to/file.txt', 'ftp://domain.com/file.psd', 'git://user:password@git.server/tree/export.json', 'ssh://user@path.co/var/www/', '//domain.com'],
        text = ['Url : ', 'Protocole : ', 'User : ', 'Password : ', 'Domain : ', 'Path : '],
        regex = /([a-z\/]+)+(?::\/\/)+([a-z0-9._-]+)+(?:\.|:|@)+([a-z]+)+(\/|@|\.)+([a-z0-9._/-]+)/,
        body = d.getElementById('data'),
        p, data, match;

    var protocol = '([a-z\/]+)',
        separator = '(?::\/\/)',
        regex2 = '/' + protocol + '/',
        match2;
    console.log(regex2);

    for(var a = 0, b = links.length; a < b; a++){
        for(var i = 0, c = text.length; i < c; i++){
            p = d.createElement('p');
            match2 = links[a].match(regex2);
            data = d.createTextNode(text[i].concat(match[i]));
            p.appendChild(data);
            body.appendChild(p);
        }
    }




})(document, window);