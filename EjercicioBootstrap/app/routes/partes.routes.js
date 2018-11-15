module.exports = (app) => {
    const partes = require('../controllers/partes.controller.js');

    // Create a new investigadores
    app.post('/partes', partes.create);

    // Retrieve all investigadores
    app.get('/partes', partes.findAll);

    // Busca los partes leves
    app.get('/partes/faltasLeves', partes.findLeve);

    // Busca los partes graves 
    app.get('/partes/faltasGraves', partes.findGrave);

    // Retrieve a single investigadores with investigadorId
    app.get('/partes/:partesId', partes.findOne);

    // Update a investigadores with investigadorId
    app.put('/partes/:partesId', partes.update);

    // Delete a investigadores with investigadorId
    app.delete('/partes/:partesId', partes.delete);

}