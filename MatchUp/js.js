(function (d, w) {
    var links = ['http://domain.com/path/to/file.txt', 'ftp://domain.com/file.psd', 'git://user:password@git.server/tree/export.json', 'ssh://user@path.co/var/www/', '//domain.com'],
        body = d.getElementById('data'),
        data, regex, protocol, separator, domain, char, match, final;

    protocol = '([a-z0-9]*)';
    separator = '(?:[:\/@\.]*)';
    domain = '([a-z0-9\.]+)';
    char = '([a-z0-9\/\.]*)';

    final = protocol + separator + domain + separator + char + separator + char;


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
