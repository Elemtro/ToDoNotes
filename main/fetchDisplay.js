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
                let date = dateFormatting(note.date)
                dateDiv.textContent = date;
                dateDiv.className = 'note-date';
                noteDiv.appendChild(dateDiv);

                               // Create buttons container
                let buttonsDiv = document.createElement('div');
                buttonsDiv.className = 'note-buttons';

                // Create Edit button
                let editButton = document.createElement('button');
                editButton.textContent = 'Edit';
                editButton.className = 'note-button edit-button';
                editButton.onclick = function() {
                    // Add functionality for editing a note here
                    console.log('Edit button clicked for note ' + note.note_id);
                };
                buttonsDiv.appendChild(editButton);

                // Create Delete button
                let deleteButton = document.createElement('button');
                deleteButton.textContent = 'Delete';
                deleteButton.className = 'note-button delete-button';
                deleteButton.onclick = function() {
                    // Add functionality for deleting a note here
                    console.log('Delete button clicked for note ' + note.note_id);
                };
                buttonsDiv.appendChild(deleteButton);

                // Append buttons container to the note container
                noteDiv.appendChild(buttonsDiv);
                
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

function dateFormatting(date) {
    let timestamp = new Date(date);

    // Get day, month, and year
    let day = timestamp.getDate();
    let month = timestamp.toLocaleString('default', { month: 'short' });
    let year = timestamp.getFullYear();
    let dayOfWeek = timestamp.toLocaleString('default', { weekday: 'long' });

    let currentDate = new Date();
    let currentDay = currentDate.getDate();
    let currentMonth = currentDate.getMonth();
    let currentYear = currentDate.getFullYear();

    let isToday = (day === currentDay && month === currentDate.toLocaleString('default', { month: 'short' }) && year === currentYear);

    let formattedDate = '';
    if (isToday == true) {
        formattedDate = `${day} ${month} ‧ Today ‧ ${dayOfWeek}`;
    }
    else {
        formattedDate = `${day} ${month} ‧ ${dayOfWeek}`;
    }
    return formattedDate;
}

