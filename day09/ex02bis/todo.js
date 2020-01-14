$(document).ready(function() {

    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
        var thisone = cookies[i].split('=', 2);
        if ($.isNumeric(thisone[0]))
            $( "#ft_list" ).append("<div id='todo'>" + thisone[1] +"</div>");
    }

    $("button").click(function()
    {
        var valeur = prompt("Nouveau To Do");

        if (valeur)
        {
            $( "#ft_list" ).prepend("<div id='todo'>" + valeur +"</div>");
            $('#ft_list').children().each(function(index, item){                 
                document.cookie = index + '=' + item.innerHTML; 
            });
        }
    });

    $( "#ft_list" ).on( "click", "#todo",function() 
    {
        if (confirm("Etes vous sur de la suppresion ?"))
        {
            $(this).remove();
            deleteAllCookies();
            $('#ft_list').children().each(function(index, item){                 
                document.cookie = index + '=' + item.innerHTML; 
            });
        }
    });
    
});

function deleteAllCookies() {
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}