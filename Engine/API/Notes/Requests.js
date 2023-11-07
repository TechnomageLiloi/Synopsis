Synopsis.Notes = {
    RID: {
        edit: function ()
        {
            API.request('Synopsis.Notes.RID.Edit', {

            }, function (data) {
                const wrap = $('#page');
                wrap.html(data.render);
                wrap.show();
            }, function () {

            });
        },

        save: function (ridOld)
        {
            if(!confirm('Are you sure?'))
            {
                return;
            }

            const jq_block = $('#game-maps-edit');
            const rid_new = jq_block.find('[name=rid_new]').val();

            API.request('Synopsis.Notes.RID.Save', {
                rid_old: ridOld,
                rid_new: rid_new
            }, function (data) {
                window.location.href = rid_new.replace('root:', '/').replaceAll(':', '/');
            }, function () {

            });
        }
    },

    show: function ()
    {
        API.request('Synopsis.Notes.Show', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    edit: function ()
    {
        API.request('Synopsis.Notes.Edit', {

        }, function (data) {
            const wrap = $('#page');
            wrap.html(data.render);
            wrap.show();
        }, function () {

        });
    },

    create: function ()
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Synopsis.Notes.Create', {

        }, function (data) {
            Synopsis.Notes.show();
        }, function () {

        });
    },

    save: function (keyNote)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#game-maps-edit');
        API.request('Synopsis.Notes.Save', {
            key_note: keyNote,
            title: jq_block.find('[name=title]').val(),
            status: jq_block.find('[name=status]').val(),
            note: jq_block.find('[name=note]').val(),
            position: jq_block.find('[name=position]').val(),
        }, function (data) {
            Synopsis.Notes.show();
        }, function () {

        });
    }
}