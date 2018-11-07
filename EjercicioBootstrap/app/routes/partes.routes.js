module.exports = (app) => {
    const partes = require('../controllers/partes.controller.js');

    // Create a new investigadores
    app.post('/partes', partes.create);

    // Retrieve all investigadores
    app.get('/partes', partes.findAll);

    // Retrieve a single investigadores with investigadorId
    app.get('/partes/:partesId', partes.findOne);

    // Update a investigadores with investigadorId
    app.put('/partes/:partesId', partes.update);

    // Delete a investigadores with investigadorId
    app.delete('/partes/:partesId', partes.delete);

}