var bKeys = [];

$('body').keydown(function(e) {
  if (bKeys.includes(e.which) === false) {
    bKeys.push(e.which);
  }
});

$('body').keyup(function(e) {
  bKeys.pop(e.which);
});
setInterval(() => {
  console.log(bKeys);
}, 15);