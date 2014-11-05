function startCallback() {
    return true;
}

function completeCallback(response) {
    document.getElementById('nr').innerHTML = parseInt(document.getElementById('nr').innerHTML) + 1;
    document.getElementById('r').innerHTML = response;
}