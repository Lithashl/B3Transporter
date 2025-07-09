function getAddress(){
    var address = document.getElementById('address').value;
    return address;
}
function viewMap(){
    // if(!getAddress()){
    //     document.getElementById("map").innerHTML='<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAOVYRIgupAurZup5y1PRh8Ismb1A3lLao&q=sidosermo 4 gg 12" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
        
    // }
    // else{
    //     document.getElementById("map").innerHTML='<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAOVYRIgupAurZup5y1PRh8Ismb1A3lLao&q='+getAddress()+'" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
    // }
    document.getElementById("map").innerHTML='<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAOVYRIgupAurZup5y1PRh8Ismb1A3lLao&q='+getAddress()+'" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
}
