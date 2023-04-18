//https://stackoverflow.com/a/45656609
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}