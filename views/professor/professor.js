function loadData(id) {
    getUrl(`${BASEURL}/professor/loadData/${id}`).then(res => {
        if (res.data.length > 0) {
            var user = document.querySelector('#user');
            var curLiv = document.querySelector('#curLiv');
            var nome = document.querySelector('#nomeProf');
            var txtCriado = document.querySelector('#txtCriado');
            user.value = res.data[0].username;
            user.dispatchEvent(new Event('change'));
            curLiv.value = res.data[0].cursolivre;
            curLiv.dispatchEvent(new Event('change'));
            nome.value = res.data[0].nomecompleto;
            nome.dispatchEvent(new Event('change'));
            txtCriado.value = res.data[0].criado;
            txtCriado.dispatchEvent(new Event('change'));
            activateLabel(document.querySelector("label[for='user']"))
            activateLabel(document.querySelector("label[for='curLiv']"))
            activateLabel(document.querySelector("label[for='nomeProf']"))
            activateLabel(document.querySelector("label[for='txtCriado']"))
        }
        document.querySelector("#curLiv").readOnly = true;
        document.querySelector("#user").readOnly = true;
        showEdit()
    })
}

function del(id) {
    if (confirm("Confirmar Exclusão?")) {
        var params = { id: id };
        deleteItem(`${BASEURL}/professor/del`, params).then(res => {
            alert(res.data.texto);
            if (res.data.codigo == "1") {
                listaProfessor();
            }
        });
    }
}

function addProfessor(cursolivre) {
    const myModal = document.getElementById('formModal')
    const modal = new mdb.Modal(myModal)

    if (cursolivre) {
        listaProfessor(cursolivre);
    }
    modal.show();
}

function edtFormProf(cursolivre) {
    const myModal = document.getElementById('formModal')
    const modal = new mdb.Modal(myModal)

    if (cursolivre) {
        loadData(cursolivre);
    }
    modal.show();
}

function listaProfessor() {

    document.querySelector("#lsprofessor").innerHTML = "";
    getUrl(BASEURL + "/professor/listaProfessor").then(res => {
        var txt = "";
        for (var i = 0; i < res.data.length; i++) {
            var reg = res.data[i];
            var bEdit = `<a href= 'javascript:void(0)' onclick='edtFormProf(${reg.cursolivre});'><i class="fas fa-edit"></i></a>`;
            var bDel = `<a href='javascript:void(0)' onclick='del(${reg.cursolivre});'><i class="fas fa-trash"></i></a>`;
            txt += `<tr>
            <td>${reg.username}</td>
            <td>${reg.cursolivre}</td>
            <td>${reg.nomecompleto}</td>
            <td>${reg.criado}</td>
            <td>${bEdit} ${bDel}</td>
        </tr>`;
        }
        document.querySelector('#lsprofessor').innerHTML = txt;
    })
}

function reset() {
    document.querySelector("#frmCadProfessor").reset();
    document.querySelector("#curLiv").readOnly = false;
    document.querySelector("#user").readOnly = false;
    hideEdit();
}

document.addEventListener("DOMContentLoaded", () => {

    reset();
    listaProfessor();
    document.querySelector("#btnInc").addEventListener("click", function() {
        let form = document.querySelector("#frmCadProfessor");
        postForm(`${BASEURL}/professor/addProfessor`, form).then(res => {
            alert(res.data.texto);
            if (res.data.codigo == "1") {
                reset();
                listaProfessor();
            }
        })
    });

    document.querySelector("#btnSave").addEventListener("click", function() {
        let form = document.querySelector("#frmCadProfessor");
        postForm(`${BASEURL}/professor/save`, form).then(res => {
            alert(res.data.texto);
            if (res.data.codigo == "1") {
                reset();
                listaProfessor();
            }
        })
    });

    document.querySelector("#btnCancel").addEventListener("click", function() {
        reset();
    });

    document.querySelector("#btnShModal").addEventListener("click", function() {
        addProfessor()
    });

    document.querySelector(".btn-close").addEventListener("click", function() {
        const myModal = document.getElementById('formModal');
        const backdrop = document.querySelector('.modal-backdrop');
        myModal.classList.remove('in');
        backdrop.remove();
        myModal.style.display = "none";
    })

});