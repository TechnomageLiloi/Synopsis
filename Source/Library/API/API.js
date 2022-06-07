/**
 *
 * @type {{request: API.request}}
 */
const API = {
  /**
   * Execute API method.
   *
   * @param method API method name.
   * @param parameters List of parameters.
   * @param success Function for success.
   * @param failure Function for failure.
   */
  request: function (
      method,
      parameters,
      success,
      failure
  ) {
    $('body').css('cursor', 'wait');
    $.ajax({
      type: 'POST',
      dataType: 'json',
      data: {
        method: method,
        parameters: parameters
      },
      success: function (data) {
        success(data);
      },
      error: function()
      {
        failure();
      },
      complete: function () {
        $('body').css('cursor', 'default');
      }
    });
  }
};