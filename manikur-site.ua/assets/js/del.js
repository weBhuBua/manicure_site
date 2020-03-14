let btnDel = document.querySelectorAll('.btn-del');

btnDel.forEach(elem => {
    elem.onclick = (e) => {

        console.log(e.toElement.name);
        let eName = e.toElement.name;

        let xhttp10 = new XMLHttpRequest();

        xhttp10.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                t10(this.responseText);
            }
        }

        xhttp10.open("POST", '../../php/admin_old.php', true);
        xhttp10.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp10.send(eName);

        function t10(data) {
            console.log(data);
        }
    }
})