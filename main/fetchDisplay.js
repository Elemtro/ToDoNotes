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
                
                setTimeout(function() {
                    if (note.data.length > 120) {
                        contentDiv.style.cursor = "pointer";
                        contentDiv.addEventListener('mouseenter', function() {
                            contentDiv.style.backgroundColor = 'rgba(0, 0, 0, 0.1)';
                        });
                        contentDiv.addEventListener('mouseleave', function() {
                            contentDiv.style.backgroundColor = ''; // Reset background color on mouse leave
                        });
                        createPopup(contentDiv.innerHTML, note.note_id)
                        contentDiv.addEventListener('click', () => {
                            setupPopup(note.note_id);
                        });
                    } else if (contentDiv.scrollHeight > 120) {
                        createPopup(contentDiv.innerHTML, note.note_id)
                        contentDiv.addEventListener('click', () => {
                            setupPopup(note.note_id);
                        });
                    }
                }, 0);
                
                
                // Append contentDiv to noteDiv
                noteDiv.appendChild(contentDiv);

                // Create a container for buttons and date
                let bottomContainer = document.createElement('div');
                bottomContainer.className = 'bottom-container';

                // Create date
                let dateDiv = document.createElement('div');
                let date = dateFormatting(note.date)
                dateDiv.textContent = date;
                dateDiv.className = 'note-date';
                //noteDiv.appendChild(dateDiv);

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


                bottomContainer.appendChild(dateDiv);
                bottomContainer.appendChild(buttonsDiv);


                // Append buttons container to the note container
                //noteDiv.appendChild(buttonsDiv);
                noteDiv.appendChild(bottomContainer);
                
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

// Function to create the popup structure
function createPopup(content, id) {
    // Access popup container
    let popupContainer = document.getElementById('popupsContainer');

    //Create popup
    let popup = document.createElement('div');
    popup.className = 'popup';
    popup.id = 'pop' + id;
    // Create overlay and put it inside popup div
    let overlayDiv = document.createElement('div');
    overlayDiv.className = 'overlay';
    popup.appendChild(overlayDiv);

    // Create popup content container
    let popupContent = document.createElement('div');
    popupContent.className = "popupContent";

    // Create popup content
    let contentDiv = document.createElement('div');
    contentDiv.className = 'content';
    contentDiv.innerHTML = content;
    popupContent.appendChild(contentDiv);

    popup.appendChild(popupContent);
    popupContainer.appendChild(popup);
}

function setupPopup(id) {
    let popup = document.getElementById("pop" + id);
    popup.classList.add("active");
    
    let overlay = popup.querySelector('.overlay');
    overlay.addEventListener("click", function() {
        popup.classList.remove("active");
    });
}