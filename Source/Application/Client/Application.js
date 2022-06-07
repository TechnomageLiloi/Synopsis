/**
 * Application client.
 *
 * @type {{cancel: Application.cancel, edit: Application.edit, startup: Application.startup, create: (function(): (undefined)), update: (function(*=): (undefined)), up: (function(*=): (undefined)), complete: (function(*=): (undefined)), render: Application.render}}
 */
const Application = {
    render: function () {
        API.request('General.Render', {}, function (data) {
            $('#content').html(data.response.render);
        }, function () {

        });
    }
};