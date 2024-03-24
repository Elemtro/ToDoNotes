document.getElementById('addTaskContainer').addEventListener('click', function() {
    document.getElementById('form').style.display = 'block';
    document.getElementById('addTaskContainer').style.display = 'none';
});

document.getElementById('closeTaskInput').addEventListener('click', function() {
    document.getElementById('taskInput').value = ''; // Clear the textarea content
    document.getElementById('form').style.display = 'none';
    document.getElementById('addTaskContainer').style.display = 'block';
    const textarea = document.querySelector('textarea');
    textarea.style.height = 'auto'; // Resetting height to auto to recalculate scrollHeight
});