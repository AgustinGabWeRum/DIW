module.exports = (app) => {
    const investigadores = require('../controllers/investigador.controller.js');

    // Create a new investigadores
    app.post('/parteLeve', investigadores.create);

    // Create a new investigadores
    app.post('/parteGrave', investigadores.create);

    // Retrieve all investigadores
    app.get('/parteLeve', investigadores.findAll);

    // Retrieve all investigadores
    app.get('/parteGrave', investigadores.findAll);

    // Retrieve a single investigadores with investigadorId
    app.get('/parteLeve/:parteLeveId', investigadores.findOne);

    // Retrieve a single investigadores with investigadorId
    app.get('/parteGrave/:parteGraveId', investigadores.findOne);

    // Update a investigadores with investigadorId
    app.put('/parteLeve/:parteLeveId', investigadores.update);

    // Update a investigadores with investigadorId
    app.put('/parteGrave/:parteGraveId', investigadores.update);

    // Delete a investigadores with investigadorId
    app.delete('/parteLeve/:parteLeveId', investigadores.delete);

    // Delete a investigadores with investigadorId
    app.delete('/parteGrave/:parteGraveId', investigadores.delete);
}