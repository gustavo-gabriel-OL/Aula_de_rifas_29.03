$(document).ready(function(){

    $('.nav-link').clik(function(e){
        e.preventDefault()

        let url = $(this).attr('href')

        $('#content').empty()

        $('#content').load(url)
    })
})