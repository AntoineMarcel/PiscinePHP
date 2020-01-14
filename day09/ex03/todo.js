$(document).ready(function() {

    $.ajax({
        url : 'select.php',
        type : 'GET',
        dataType : 'json', // On désire recevoir du HTML
        success : function(data){ // code_html contient le HTML renvoyé
            var i = 0;
            while (data[i])
            {
                $( "#ft_list" ).append("<div id='todo'>" + data[i].split(';', 2)[1] +"</div>");
                i++;
            }
        }
     });

    $("button").click(function(){
        var valeur = prompt("Nouveau To Do");
        if (valeur === "")
            console.log("NULL VALUE");
        else if(valeur)
        {
            $.ajax({
                url : 'insert.php',
                type : 'GET',
                data: { todo: valeur },
                dataType : 'html', // On désire recevoir du HTML
                success : function(code_html, statut){ // code_html contient le HTML renvoyé
                    $( "#ft_list" ).prepend("<div id='todo'>" + valeur +"</div>");
                }
            });
        }
    });

    $( "#ft_list" ).on( "click", "#todo",function() 
    {
        if (confirm("Etes vous sur de la suppresion ?"))
        {
            $(this).remove();
            $.ajax({
                url : 'delete.php',
                type : 'GET',
                data: { todo: this.innerHTML },
                dataType : 'html', // On désire recevoir du HTML
                success : function(code_html, statut){
                    console.log(code_html);
                }
            });
        }
    });
});