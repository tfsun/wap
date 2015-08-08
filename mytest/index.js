var f = function() {alert("Yea, it's Saturday!");};
f["temperature"] = "72 degrees";
f["displayTemperature"] = function(){ alert(f["temperature"]);};

