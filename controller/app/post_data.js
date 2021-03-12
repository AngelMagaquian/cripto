export function post_data(direccion, data){
    const url_php = direccion;
    console.log('POST: '+ postData);
    return new Promise((resolve, reject) => {
      $.ajax({
        url: url_php,
        type: 'POST',
        data: {data},
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