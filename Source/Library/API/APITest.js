describe("Library.API", function() {

  it("API::define", function() {
    expect(typeof(API) == 'object').toBeTrue();
    expect(typeof(API.request) == 'function').toBeTrue();
  });
});
