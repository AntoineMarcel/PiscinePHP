function newcontenu()
{
    var valeur = prompt("Nouveau To Do");
    if (valeur === "")
            console.log("NULL VALUE");
    else if(valeur)
    {
        var newNode = document.createElement('div');
        var parentNodes = document.getElementById('ft_list');
        newNode.innerHTML = valeur;
        newNode.setAttribute("onclick","deletetodo(this)");
        parentNodes.insertBefore(newNode, parentNodes.firstChild);
        var c = parentNodes.childNodes;
        var i;
        for (i = 0; i < c.length; i++) 
            document.cookie = i + '=' + c[i].innerHTML;
    }
}

function deletetodo(x)
{
    var parentNodes = document.getElementById('ft_list');
    var c = parentNodes.childNodes;

    if (confirm("Etes vous sur de la suppresion ?"))
    {
        parentNodes.removeChild(x);
        var c = parentNodes.childNodes;
        deleteAllCookies();
        var i;
        for (i = 0; i < c.length; i++) 
            document.cookie = i + '=' + c[i].innerHTML;
    }
}

function atLaunch()
{
    var parentNodes = document.getElementById('ft_list');
    var i = 0;
    while (document.cookie.indexOf(i + "=") != -1)
    {
        var newNode = document.createElement('div');
        var start = document.cookie.indexOf(i + "=");
        if (start == -1)
            break;
        var str = document.cookie;
        str = str.substring(start);
        if (str.search(";") == -1)
            str = str.substring(str.search("=") + 1);
        else
            str = str.substring(str.search("=") + 1, str.search(";"));
        newNode.innerHTML = str;
        newNode.setAttribute("onclick","deletetodo(this)");
        parentNodes.appendChild(newNode);
        i++;
    }
}

function deleteAllCookies() {
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}