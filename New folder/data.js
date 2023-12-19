function saveData() {
    const dataInput = document.getElementById('dataInput').value;
    localStorage.setItem('savedData', dataInput);
    document.getElementById('output').innerHTML = 'Data saved successfully!';
}

function retrieveData() {
    const storedData = localStorage.getItem('savedData');
    if (storedData) {
        document.getElementById('output').innerHTML = `Retrieved Data: ${storedData}`;
    } else {
        document.getElementById('output').innerHTML = 'No data stored.';
    }
}
