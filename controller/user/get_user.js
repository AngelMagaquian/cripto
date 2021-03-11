export function get_user (){
    $.post('../../model/user/user_information.php', function(response){
        return response;
    });
}