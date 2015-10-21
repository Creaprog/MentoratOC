var link = prompt("Enter url to match!");

if(/(https|http|ftp|steam|git|ssh):\/\/+([a-z0-9._-]+)+(\.|:|@)+([a-z]+)+(\/|@|\.)+([a-z0-9._/-]+)/.test(link)){
    console.log('Find !' + '\nProtocole : ' + RegExp.$1 + '\nLocal : ' + RegExp.$2 + '\nDomaine : ' + RegExp.$4 + '\npath :' + RegExp.$6);
}else{
    console.log('Don\'t find');
}
