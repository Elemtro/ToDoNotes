document.getElementById('addTaskContainer').addEventListener('click', function() {
    document.getElementById('form').style.display = 'block';
    document.getElementById('addTaskContainer').style.display = 'none';
    document.getElementById('addTaskContainer').style.opacity = '0'; // Fade out the button
    setTimeout(() => {
        document.getElementById('addTaskContainer').style.display = 'none'; // Hide the button after fade out
    }, 300); // Time should match the transition duration (0.3s = 300ms)
});

document.getElementById('closeTaskInput').addEventListener('click', function() {
    document.getElementById('taskInput').value = ''; // Clear the textarea content
    document.getElementById('form').style.display = 'none';
    document.getElementById('error').innerHTML = '';
    document.getElementById('addTaskContainer').style.display = 'flex';
    document.getElementById('addTaskContainer').style.opacity = '1'; // Ensure the button is fully visible
    const textarea = document.querySelector('textarea');
    textarea.style.height = 'auto'; // Resetting height to auto to recalculate scrollHeight
});