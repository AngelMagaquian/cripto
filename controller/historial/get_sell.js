export function shopping_historial(user){
    
    return new Promise((resolve, reject) => {
      $.ajax({
        url: '../../model/historial/sell_historial.php',
        type: 'POST',
        data: {user},
        success: function(response) {
          //const json = JSON.parse(response);
          //mandamos la repuesta al controller
          resolve(response);
        },
        error: function(error) {
            
          // "Marcamos" la Promise con error.
          reject(error);
        }
      });
    });
}


