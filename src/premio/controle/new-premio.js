$(document).ready(function() {
    $('.btn-new').click(function(e) {
        e.preventDefault()

        $('.modal-title').empty()
        $('.modal-body').empty()

        $('.modal-title').append('Adicionar novo premio de acesso')
        
        $('.modal-body').load('src/premio/visao/form-premio.html', function(){
            $.ajax({
               dataType: 'json',
               type: 'POST',
               assync: true,
               url: 'src/tipo/modelo/all-tipo.php',
               success: function(dados){
                   for(const result of dados){
                       $('#TIPO_ID').append(`<option value="${result.ID}">${result.NOME}</option>`)
                   }
               }  
            })
        })

        $('.btn-save').show()

        $('.btn-save').attr('data-operation', 'insert')

        $('#modal-premio').modal('show')

        
    })

    $('.close, #close').click(function(e){
        e.preventDefault()

        $('#modal-premio').modal('hide')
    })
})