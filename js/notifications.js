$(document).ready(function(){

    function load_unseen_notification(view = '')
    {
        $.ajax({
            url:"fetch.php",
            method:"POST",
            data:{view:view},
            dataType:"json",
            success:function(result)
            {
                result.notifs.forEach(function(element){
                    var status;
                    switch (element.status) {
                        case "Pagato":
                            status = "Il tuo ordine è stato confermato";
                            break;
                        case "In Consegna":
                            status = "Il tuo ordine è in consegna";
                            break;
                        case "Completato":
                            status = "Il tuo ordine è stato consegnato";
                            break;
                        default:
                            //Tutte le altre notifiche;
                            status = element.status;
                            break;
                    }
                    var msg = element.time + " - Il tuo ordine è " + status;
                    Notify(msg,
                        function () {
                            window.location = "/utenteNotifiche.php";
                        },
                        null, 'info');
                });

                if(result.count > 0)
                {
                    $('.count').html(result.count);
                }
            }
        });
    }

    load_unseen_notification();

    setInterval(function(){
        load_unseen_notification();;
    }, 5000);
});
