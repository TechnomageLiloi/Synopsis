Requests.Book = {
    create: function ()
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Book.Create', {
            debug: false
        }, function (data) {
            Requests.Book.show();
        }, function () {

        });
    },

    show: function ()
    {
        API.request('Book.Show', {
            debug: false
        }, function (data) {
            $('#page').html(data.render);
            Synopsis.Trigger.initialize();
        }, function () {

        });
    },

    edit: function (key_day)
    {
        API.request('Book.Edit', {
            key_day: key_day
        }, function (data) {
            const wrap = $('#page');
            wrap.html(data.render);
            wrap.show();
        }, function () {

        });
    },

    save: function (key_day)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#application-diary-edit');
        API.request('Book.Save', {
            key_day: key_day,
            data: jq_block.find('[name=data]').val(),
            program: jq_block.find('[name=program]').val()
        }, function (data) {
            Requests.Book.show();
        }, function () {

        });
    }
}