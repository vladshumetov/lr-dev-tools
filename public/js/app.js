if(document.getElementById('cards'))
{
    Sortable.create(cards, {
        handle: '.col',
        animation: 150
    });
}

$("#create_world").on('submit', function (event) {
   event.preventDefault();

   let map_name = $('#map_name').val();
   let map_desc = $('#map_desc').val();

   $.ajax({
       url: "worlds/create_world",
       type: "POST",
       data: {
           "_token": $('meta[name="csrf-token"]').attr('content'),
           map_name: map_name,
           map_desc: map_desc
       },

       success: function (response) {
           console.log(response);
           $('#cards').append(response);
       },
   });
});
