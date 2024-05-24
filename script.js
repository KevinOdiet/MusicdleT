document.getElementById('textInput').addEventListener('keydown', function (event) {
    if (event.key === 'Enter') {
        validateInput()
    }
});

document.getElementById('validateButton').addEventListener('click', function () {
    validateInput();
});

function validateInput() {
    const textInput = document.getElementById('textInput');
    const displayTextContainer = document.getElementById('displayTextContainer');

    if (textInput.value.trim() !== '') {
        const newText = document.createElement('p');
        newText.textContent = textInput.value;
        displayTextContainer.appendChild(newText);

        textInput.value = '';
    }
}