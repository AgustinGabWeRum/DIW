const Partes = require('../models/partes.model.js');

// Crear y salvar
exports.create = (req,res)=>{

    // Validamos el partes
    if (!req.body){
        console.log(req.body);
        return res.status(400).send({
           message:"partes Vacio..." 
        });
    }

    const partes = new Partes({
        nom: req.body.nom || "Sin Nombre",
        grup: req.body.grup || "Sin grupo",
        professor: req.body.professor || "Sin profesor",
        atencio: req.body.atencio || "Sin horario de atencion",
        incident: req.body.incident,
        horari: req.body.horari || "Sin horario",
        lloc: req.body.lloc || "Sin lugar",
        grave:req.body.grave,
        leve:req.body.leve,
        cboxA: req.body.cboxA,
        cboxB: req.body.cboxB,
        cboxC: req.body.cboxC,
        cboxD: req.body.cboxD,
        cboxE: req.body.cboxE,
        cboxF: req.body.cboxF,
        aLeve: req.body.aLeve,
        bLeve: req.body.bLeve,
        cLeve: req.body.cLeve,
        dLeve: req.body.dLeve,
        eLeve: req.body.eLeve,
        fLeve: req.body.fLeve,
        gLeve: req.body.gLeve,
        hLeve: req.body.hLeve,
        iLeve: req.body.iLeve,
        jLeve: req.body.jLeve,
        kLeve: req.body.kLeve,
        lLeve: req.body.lLeve,
        mLeve: req.body.mLeve,
        nLeve: req.body.nLeve,
        oLeve: req.body.oLeve,
        pLeve: req.body.pLeve,
        qLeve: req.body.qLeve,
        rLeve: req.body.rLeve,
        sLeve: req.body.sLeve,
        aGrave: req.body.aGrave,
        bGrave: req.body.bGrave,
        cGrave: req.body.cGrave,
        dGrave: req.body.dGrave,
        eGrave: req.body.eGrave,
        fGrave: req.body.fGrave,
        gGrave: req.body.gGrave,
        hGrave: req.body.hGrave,
        iGrave: req.body.iGrave,
        jGrave: req.body.jGrave,
        kGrave: req.body.kGrave,
        lGrave: req.body.lGrave,
        mGrave: req.body.mGrave,
        nGrave: req.body.nGrave,
        oGrave: req.body.oGrave,
        pGrave: req.body.pGrave,
    })

    partes.save().then(data =>{
        res.redirect("menu.html");
    }).catch(err => {
        res.status(500).send({
            message: err.message|| "Something was wrong creating partes"
        });
    });
};



// Obtener todos los parteses
exports.findAll = (req,res) => {

        Partes.find().then(parteses=>{
            res.send(parteses);
        }).catch(err=>{
            res.status(500).send({
                message: err.message || " Algo fue mal mientras los capturabamos a todos"
            });
        });

};

exports.findLeve = (req,res) => {

    Partes.find({leve:"leve"}).then(parteses=>{
        res.send(parteses);
    }).catch(err=>{
        res.status(500).send({
            message: err.message || " Algo fue mal mientras los capturabamos a todos"
        });
    });

};

exports.findGrave = (req,res) => {

    Partes.find({grave:"grave"}).then(parteses=>{
        res.send(parteses);
    }).catch(err=>{
        res.status(500).send({
            message: err.message || " Algo fue mal mientras los capturabamos a todos"
        });
    });

};


// Obtener un partes por Id
exports.findOne = (req,res) => {
    Partes.findById(req.params.partesId)
    .then(partes=>{
        if (!partes){
            return res.status(404).send({
                message: "partes NOT FOUND con ID " +req.params.partesId
            });
            }
            res.send(partes);
        }).catch(err=>{
            if(err.kind === 'ObjectId'){
                return res.status(404).send({
                    message: "partes no encontrado con ese id :" +req.params.partesId
                });
            }
             return res.status(500).send({
                message: "Tenemos NOSOTROS problemas con ese id :" +req.params.partesId
             });
        });
    };




// Actualizar un partes
exports.update = (req, res) => {
    // Validate Request
    if(!req.body) {
        return res.status(400).send({
            message: "partes vacio"
        });
    }

    // Find note and update it with the request body
    Partes.findByIdAndUpdate(req.params.partesId, {
        nom: req.body.nom || "Sin Nombre",
        grup: req.body.grup || "Sin grupo",
        professor: req.body.professor || "Sin profesor",
        atencio: req.body.atencio || "Sin horario de atencion",
        incident: req.body.incident,
        horari: req.body.horari || "Sin horario",
        lloc: req.body.lloc || "Sin lugar",
        grave:req.body.grave,
        leve:req.body.leve,
        cboxA: req.body.cboxA,
        cboxB: req.body.cboxB,
        cboxC: req.body.cboxC,
        cboxD: req.body.cboxD,
        cboxE: req.body.cboxE,
        cboxF: req.body.cboxF,
        aLeve: req.body.aLeve,
        bLeve: req.body.bLeve,
        cLeve: req.body.cLeve,
        dLeve: req.body.dLeve,
        eLeve: req.body.eLeve,
        fLeve: req.body.fLeve,
        gLeve: req.body.gLeve,
        hLeve: req.body.hLeve,
        iLeve: req.body.iLeve,
        jLeve: req.body.jLeve,
        kLeve: req.body.kLeve,
        lLeve: req.body.lLeve,
        mLeve: req.body.mLeve,
        nLeve: req.body.nLeve,
        oLeve: req.body.oLeve,
        pLeve: req.body.pLeve,
        qLeve: req.body.qLeve,
        rLeve: req.body.rLeve,
        sLeve: req.body.sLeve,
        aGrave: req.body.aGrave,
        bGrave: req.body.bGrave,
        cGrave: req.body.cGrave,
        dGrave: req.body.dGrave,
        eGrave: req.body.eGrave,
        fGrave: req.body.fGrave,
        gGrave: req.body.gGrave,
        hGrave: req.body.hGrave,
        iGrave: req.body.iGrave,
        jGrave: req.body.jGrave,
        kGrave: req.body.kGrave,
        lGrave: req.body.lGrave,
        mGrave: req.body.mGrave,
        nGrave: req.body.nGrave,
        oGrave: req.body.oGrave,
        pGrave: req.body.pGrave,
        
    }, {new: true})
    .then(partes => {
        if(!partes) {
            return res.status(404).send({
                message: "partes not found with id " + req.params.partesId
            });
        }
        res.send(partes);
    }).catch(err => {
        if(err.kind === 'ObjectId') {
            return res.status(404).send({
                message: "partes not found with id " + req.params.partesId
            });                
        }
        return res.status(500).send({
            message: "Error updating partes with id " + req.params.partesId
        });
    });
};

// Borrar un partes 
exports.delete = (req,res)=>{
    Partes.findByIdAndRemove(req.params.partesId)
    .then(partes => {
        if(!partes) {
            return res.status(404).send({
                message: "partes no encontrado " + req.params.partesId
            });
        }
        res.send({message: "Cthulhu ha vencido !"});
    }).catch(err => {
        if(err.kind === 'ObjectId' || err.name === 'NotFound') {
            return res.status(404).send({
                message: "partes not found with id " + req.params.partesId
            });                
        }
        return res.status(500).send({
            message: "No podemos matar a ese partes with id " + req.params.partesId
        });
    });
};