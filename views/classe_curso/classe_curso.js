function loadData(id) {
    getUrl(`${BASEURL}/classe_curso/loadData/${id}`).then(res => {
        if (res.data.length > 0) {
            var codCur = document.querySelector('#selCodCurso');
            var codTipCur = document.querySelector('#selCodTipCurso');
            var ano = document.querySelector('#txtAno');
            var sem = document.querySelector('#txtSem');
            var desc = document.querySelector('#txtDesc');
            var termo = document.querySelector('#txtTerm');
            var turma = document.querySelector('#txtTurma');
            var idPai = document.querySelector('#txtIdPai');
            codCur.value = res.data[0].codcurso;
            codCur.dispatchEvent(new Event('change'));
            codTipCur.value = res.data[0].codtipocurso;
            codTipCur.dispatchEvent(new Event('change'));
            ano.value = res.data[0].ano;
            ano.dispatchEvent(new Event('change'));
            sem.value = res.data[0].semestre;
            sem.dispatchEvent(new Event('change'));
            desc.value = res.data[0].descricao;
            desc.dispatchEvent(new Event('change'));
            termo.value = res.data[0].termo;
            termo.dispatchEvent(new Event('change'));
            turma.value = res.data[0].turma;
            turma.dispatchEvent(new Event('change'));
            idPai.value = res.data[0].idcategoriapaimoodle;
            idPai.dispatchEvent(new Event('change'));
            activateLabel(document.querySelector("label[for='txtAno']"));
            activateLabel(document.querySelector("label[for='txtSem']"));
            activateLabel(document.querySelector("label[for='txtDesc']"));
            activateLabel(document.querySelector("label[for='txtTerm']"));
            activateLabel(document.querySelector("label[for='txtTurma']"));
            activateLabel(document.querySelector("label[for='txtIdPai']"));

            showEdit();
        }
    })
}

function del(id) {
    if (confirm("Confirmar Exclusão?")) {
        var params = { id: id };
        deleteItem(`${BASEURL}/classe_curso/del`, params).then(res => {
            alert(res.data.texto)
            if (res.data == "") {
                alert("Erro ao Excluir!")
            }
            if (res.data.codigo == "1") {
                listaClasse();
            }
        });
    }
}

function addClasse(sequencia) {
    const myModalClass = document.getElementById('formModalClass')
    const modalClass = new mdb.Modal(myModalClass)

    if (sequencia) {
        listaClasse(sequencia);
    }
    modalClass.show();
}

function edtFormClass(sequencia) {
    const myModalClass = document.getElementById('formModalClass')
    const modalClass = new mdb.Modal(myModalClass)

    if (sequencia) {
        loadData(sequencia);
    }
    modalClass.show();
}

function selCodCurso() {
    getUrl(BASEURL + "/classe_curso/selCodCurso").then(res => {
        var txt = "<option selected disabled>Selecione o Curso</option>";
        res.data.forEach(element => {
            txt += `<option value="${element.codcurso}">${element.nomecurso}</option>`
        })
        document.querySelector("#selCodCurso").innerHTML = txt;
    })
}
selCodCurso()


function listaClasse() {

    document.querySelector("#lsclasse").innerHTML = "";
    getUrl(BASEURL + "/classe_curso/listaClasse")
        .then(res => {
            var txt = "";
            for (var i = 0; i < res.data.length; i++) {
                var reg = res.data[i];
                var bEdit = `<a href= 'javascript:void(0)' onclick='edtFormClass(${reg.sequencia});'><i class="fas fa-edit"></i></a>`;
                var bDel = `<a href='javascript:void(0)' onclick='del(${reg.sequencia});'><i class="fas fa-trash"></i></a>`;
                txt += `<tr>
                        <td>${reg.ano}</td>
                        <td>${reg.semestre}</td>
                        <td>${reg.descricao}</td>
                        <td>${reg.termo}</td>
                        <td>${reg.turma}</td>
                        <td>${reg.idcategoriapaimoodle}</td>
                        <td>${reg.codcurso}</td>
                        <td>${reg.codtipocurso}</td>
                        <td>${bEdit} ${bDel}</td>
                    </tr>`;
            }
            document.querySelector("#lsclasse").innerHTML = txt
        })
}
listaClasse();

function reset() {
    document.querySelector("#frmCadClass").reset();
    document.querySelector("#selCodCurso").readOnly = false;
    hideEdit();
}

document.addEventListener("DOMContentLoaded", () => {

    reset();
    listaClasse()

    document.querySelector("#btnInc").addEventListener("click", function() {
        let form = document.querySelector("#frmCadClass");
        postForm(`${BASEURL}/classe_curso/insert`, form).then(res => {
            alert(res.data.texto);
            if (res.data.codigo == "1") {
                reset();
                listaClasse();
            }
        })
    });


    document.querySelector("#btnSave").addEventListener("click", function() {
        let form = document.querySelector("#frmCadClass");
        postForm(`${BASEURL}/classe_curso/save`, form).then(res => {
            alert(res.data.texto);
            if (res.data.codigo == "1") {
                reset();
                listaClasse();
            }
        })
    });

    document.querySelector("#btnCancel").addEventListener("click", function() {
        reset();
    });

    document.querySelector("#btnShModalClass").addEventListener("click", function() {
        addClasse()
    });

    document.querySelector(".btn-close").addEventListener("click", function() {
        const myModalClass = document.getElementById('formModalClass');
        const backdrop = document.querySelector('.modal-backdrop');
        myModalClass.classList.remove('in');
        backdrop.remove();
        myModalClass.style.display = "none";
    })
});