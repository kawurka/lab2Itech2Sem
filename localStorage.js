function getLS1() {
    let group = document.getElementById("group").value;
    let result = localStorage.getItem(group);
    document.getElementById('res').innerHTML = result;
}
function getLS2() {
    let teacher = document.getElementById("teacher").value;
    let disciple = document.getElementById("disciple").value;
    let key = teacher + " " + disciple; 
    let result = localStorage.getItem(key);

    document.getElementById('res').innerHTML = result;
}
function getLS3(){
    let auditorium = document.getElementById("auditorium").value;
    let result = localStorage.getItem(auditorium);
    document.getElementById('res').innerHTML = result;
}