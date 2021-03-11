export function get_data(direccion){
    const url_php = direccion;
    return new Promise((resolve, reject) => {
      $.ajax({
        url: url_php,
        type: 'POST',
        success: function(response) {
          //const json = JSON.parse(response);
          
          resolve(response);
        },
        error: function(error) {
            
          // "Marcamos" la Promise con error.
          reject(error);
        }
      });
    });
}