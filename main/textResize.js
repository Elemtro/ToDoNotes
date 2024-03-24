  // Function to auto-resize the textarea
  function autoResizeTextarea() {
    const textarea = document.querySelector('textarea');
    textarea.style.height = 'auto'; // Resetting height to auto to recalculate scrollHeight
    textarea.style.height = (textarea.scrollHeight - 26) + 'px'; // Set the height to scrollHeight minus padding
  }

  // Event listener for input changes
  document.getElementById('taskInput').addEventListener('input', autoResizeTextarea);