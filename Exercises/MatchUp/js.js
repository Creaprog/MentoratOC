(function (d, w) {
    var links = [
        'http://domain.com/path/to/file.txt',
        'ftp://domain.com/file.psd',
        'git://user:password@git.server/tree/export.json',
        'ssh://user@path.co/var/www/',
        '//domain.com',
        'user:pwd@domain.com',
        'user@domain.com',
        '//user@domain.com',
        '//user:pwd@domain.com'
    ],
        body = d.getElementById('data'),
        data, regex, protocol, domain, match, final;

    protocol = '(?:([a-z]+)(?:://)?)?';
    user = '(?:([a-zA-Z0-9_-]+)[:@])?';
    password = '(?:([^@]+)@?)?'; 
    domain = '([a-z0-9.-]+)';
    path = '(/.+)?';

    final = protocol + user + password + domain + path;
    
    // (([a-z]*)(?:://)?)?([a-zA-Z0-9_-]*)[:@]?([^@]*)@?([a-z0-9.-]+)(/.+)?

    regex = new RegExp(final);

    for (var i = 0, o = links.length; i < o; i++) {
        match = links[i].match(regex);
        for (var s = 0, q = match.length; s < q; s++) {
            p = d.createElement('p');
            data = d.createTextNode(match[s]);
            console.log(match[s]);
            p.appendChild(data);
            body.appendChild(p);
        }
    }

})(document, window);
