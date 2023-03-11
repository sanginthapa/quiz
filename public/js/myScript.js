function showMessage() {
  alert("Hello, Welcome to Quiz World!");
}

// Call the showMessage function when the page loads
window.onload = function () {
  // showMessage();
};
// counter
$(document).ready(function () {
  //timer section
  var count = 16;
  var interval = setInterval(function () {
    count--;
    if (count <= 5) {
      $("#timeout").css("border-color", "red");
      $("#timeout").css("background", "#dc353547");
    } else if (count > 5 && count < 10) {
      $("#timeout").css("border-color", "#e7bc00");
      $("#timeout").css("background", "#e7bc0038");
    } else if (count > 10) {
      $("#timeout").css("border-color", "green");
      $("#timeout").css("background", "#02d07154");
    }
    $("#timeout").text(count);
    if (count == 0) {
      // clearInterval(interval); //uncomment to stop timer
      count = 15;
      // location.reload();
      // add your code here to perform an action when the timer reaches zero
    }
  }, 1000);
});
