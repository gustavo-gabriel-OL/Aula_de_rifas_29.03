$(document).ready(function(){
    $('#table-tipo').on('click', 'button.btn-edit', function(e){
        e.preventDefault()

        //altera as informações

        $('.modal-title').empty()
        $('.modal-body').empty()
        $('.modal-title').append('visualização de registro')

        let ID = `ID=${$(this).attr('id')}`

        $.ajax({
            type: 'POST',
            datatype: 'json',
            assync: true,
            data: ID,
            url: 'src/tipo/modelo/view-tipo.php',
            success: function(dado) {
              if (dado.tipo == "success"){
                  $('.modal-body').load('src/tipo/visao/form-tipo.html', function(){
                      $('#NOME').val(dado.dados.NOME)
                      $('#ID').attr(dado.dados.ID)
                  })
                  $('.btn-save').show()
                  $('#modal-tipo').modal('show')
              } else{
                Swal.fire({ //inicialização do SweetAlert
                    title: 'e-rifa', //titulo da janela sweetalert
                    text: dados.mensagem, //mensagem retornada do microserviço
                    type: dados.tipo, //tipo de retorno {success, info ou error}
                    confirmButtonText: 'OK'
                })
              }
            }
        })

    })
})