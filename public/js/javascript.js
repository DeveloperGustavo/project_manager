
function teste(){
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    if(!email || !password) {
        $("#mymodal").modal()
        // document.getElementById("form").innerHTML = ''
        // console.log('Preencha o campo email');
    } else {
        document.getElementById("form").submit();
    }
}
