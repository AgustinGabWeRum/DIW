const grave= require('mongoose');

const FaltaGrave = mongoose.Schema({
    nom:String,
    grup:String,
    professor:String,
    atencio:Date,
    incident:Date,
    horari:Date,
    lloc:String,
    radioButtonGrave:String,
    aGrave:boolean,
    bGrave:boolean,
    cGrave:boolean,
    dGrave:boolean,
    eGrave:boolean,
    fGrave:boolean,
    gGrave:boolean,
    hGrave:boolean,
    iGrave:boolean,
    jGrave:boolean,
    kGrave:boolean,
    lGrave:boolean,
    mGrave:boolean,
    nGrave:boolean,
    oGrave:boolean,
    pGrave:boolean,
},{
    timestamps:true
});


module.exports = grave.model('ParteGrave',FaltaGrave);