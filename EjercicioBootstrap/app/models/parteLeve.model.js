const leve= require('mongoose');

const FaltaLeve = mongoose.Schema({
    nom:String,
    grup:String,
    professor:String,
    atencio:Date,
    incident:Date,
    horari:Date,
    lloc:String,
    radioButtonLeve:String,
    cboxA:boolean,
    cboxB:boolean,
    cboxC:boolean,
    cboxD:boolean,
    tasques:String,
    dias:Date,
    horas:Date,
    cboxE:boolean,
    diasExtraescolar:Date,
    diasExtraescolarFinal:Date,
    cboxF:boolean,
    clase:String,
    diasSuspensioClases:Date,
    diasSuspensioClasesFinal:Date,
    aLeve:boolean,
    bLeve:boolean,
    cLeve:boolean,
    dLeve:boolean,
    eLeve:boolean,
    fLeve:boolean,
    gLeve:boolean,
    hLeve:boolean,
    iLeve:boolean,
    jLeve:boolean,
    kLeve:boolean,
    lLeve:boolean,
    mLeve:boolean,
    nLeve:boolean,
    oLeve:boolean,
    pLeve:boolean,
    qLeve:boolean,
    rLeve:boolean,
    sLeve:boolean
},{
    timestamps:true
});


module.exports = leve.model('ParteLeve',FaltaLeve);