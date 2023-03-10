function showMessage() {
	alert("Hello, Welcome to Quiz World!");
}

// Call the showMessage function when the page loads
window.onload = function() {
	// showMessage();
};
// counter 
$(document).ready(function() {


  //timer section
  timer();
  function timer(){
    var count = 20;
    var interval = setInterval(function() {
        count--;
        $('#timer').text(count);
        if (count == 0) {
            clearInterval(interval);
            // location.reload();
            // add your code here to perform an action when the timer reaches zero
        }
    }, 1000);
  }
});