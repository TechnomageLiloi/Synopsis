Synopsis.Export = {
    text: function ()
    {
        API.request('Synopsis.Export.Text', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    }
}