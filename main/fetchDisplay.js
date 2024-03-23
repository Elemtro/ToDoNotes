window.onload = function() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetchFromDB.php', true);
    xhr.onload = function() {
        if (xhr.status == 200) {
            var notes = JSON.parse(xhr.responseText);
            var notesContainer = document.getElementById('notesContainer');
            notesContainer.innerHTML = "";
            notes.forEach(function(note) {
                // Create a container div for each note
                let noteDiv = document.createElement('div');
                noteDiv.className = 'note';
                
                // Set the note_id as a data attribute
                noteDiv.dataset.noteId = note.note_id;
                
                // Create elements for displaying note content, date, etc.
                let contentDiv = document.createElement('div');
                contentDiv.innerHTML = note.data.replace(/\n/g, '<br>');
                contentDiv.className = 'note-content';
                noteDiv.appendChild(contentDiv);
                
                let dateDiv = document.createElement('div');
                dateDiv.textContent = 'Date: ' + note.date;
                dateDiv.className = 'note-date';
                noteDiv.appendChild(dateDiv);
                
                // Append the note container to the notes container
                notesContainer.appendChild(noteDiv);
            });
        } else {
            console.error('Failed to fetch notes');
        }
    };
    xhr.onerror = function() {
        console.error('An error occurred during the AJAX request');
    };
    xhr.send();
};
