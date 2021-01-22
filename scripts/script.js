
function CopyToClipboard(containerId) {
  if (document.selection) {
    var range = document.body.createTextRange();
    range.moveToElementText(document.getElementById(containerId));
    range.select().createTextRange();
    document.execCommand("copy");
  } else if (window.getSelection) {
    var range = document.createRange();
    range.selectNode(document.getElementById(containerId));
    window.getSelection().addRange(range);
    document.execCommand("copy");

  }
}
