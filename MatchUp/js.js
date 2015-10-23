(function (d, w) {
    var links = ['http://domain.com/path/to/file.txt', 'ftp://domain.com/file.psd', 'git://user:password@git.server/tree/export.json', 'ssh://user@path.co/var/www/', '//domain.com'],
        body = d.getElementById('data'),
        data, regex, protocol, separator, domain, extension, char, charGit, match;

    protocol = '([a-z0-9\/]+)';
    separator = '([\/\/:\.@]*)';
    domain = '([a-z0-9\/]+)';
    extension = '([a-z\.]*)';
    char = '([a-z0-9\/\.]*)';
    charGit = '([a-z0-9]*)';


    regex = new RegExp(protocol + separator + domain + separator + charGit + extension + char + separator + charGit + separator + charGit + separator + char);

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
