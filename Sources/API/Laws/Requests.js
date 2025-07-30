Requests.Laws = {
    create: function ()
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Laws.Create', {
            debug: false
        }, function (data) {
            Requests.Laws.show();
        }, function () {

        });
    },

    show: function ()
    {
        API.request('Laws.Show', {
            debug: false
        }, function (data) {
            $('#page').html(data.render);
            Synopsis.Trigger.initialize();
        }, function () {

        });
    },

    edit: function (key_day)
    {
        API.request('Laws.Edit', {
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
        API.request('Laws.Save', {
            key_day: key_day,
            data: jq_block.find('[name=data]').val(),
            program: jq_block.find('[name=program]').val()
        }, function (data) {
            Requests.Laws.show();
        }, function () {

        });
    }
}